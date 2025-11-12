<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Attendance;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\AttendanceConfirmationMail;
use App\Services\QrCodeService;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class authController extends Controller
{
    public function register()
    {
        return view('admin.auth.register');
    }

    public function store(Request $request, QrCodeService $qrCodeService)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email',
            'nationality' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $admin = Admin::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'nationality' => $validated['nationality'],
            'password' => Hash::make($validated['password']),
            'phone' => $validated['phone'],
            'job_title' => $validated['job_title'],
            'gender' => $validated['gender'],
            'role' => Admin::ROLE_USER,
        ]);

        if ($request->boolean('attendance') && $request->filled('event_id')) {
            $event = Event::find($request->input('event_id'));

            if (! $event) {
                Log::warning('Event not found when attempting to create attendance during registration', [
                    'event_id' => $request->input('event_id'),
                    'email' => $validated['email'],
                ]);
            } else {
                $attendance = Attendance::firstOrNew([
                    'event_id' => $event->id,
                    'attendee_email' => $validated['email'],
                ]);

                $attendance->attendee_name = $validated['name'];
                if ($request->filled('country')) {
                    $attendance->country = $request->input('country');
                }

                if (! $attendance->exists || empty($attendance->qr_token)) {
                    $attendance->qr_token = 'attend_'.bin2hex(random_bytes(16));
                }

                $attendance->save();

                $qrData = $qrCodeService->generateAttendanceQrData($attendance);

                try {
                    Mail::to($attendance->attendee_email)->queue(
                        new AttendanceConfirmationMail($attendance, $event, $qrData)
                    );
                } catch (\Exception $e) {
                    // Log the error but don't fail the registration
                    Log::error('Failed to send attendance confirmation email', [
                        'message' => $e->getMessage(),
                        'attendance_id' => $attendance->id,
                        'event_id' => $event->id,
                    ]);
                }
            }
        }

        // Auto-login after registration
        Auth::guard('admin')->login($admin);

        return redirect()->route('admin.index');
    }
}
