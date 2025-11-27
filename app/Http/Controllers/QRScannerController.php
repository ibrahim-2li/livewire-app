<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QRScannerController extends Controller
{
    public function index()
    {
        return view('admin.qr-scanner');
    }

    public function validateQR(Request $request)
    {
        try {
            $qrData = json_decode($request->qr_data, true);

            if (!$qrData || !isset($qrData['token'])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid QR code format'
                ], 400);
            }

            $attendance = Attendance::where('qr_token', $qrData['token'])
                ->with('event')
                ->first();

            if (!$attendance) {
                return response()->json([
                    'success' => false,
                    'message' => 'QR code not found in database'
                ], 404);
            }

            // Check if already used
            if ($attendance->used_at) {
                return response()->json([
                    'success' => false,
                    'message' => 'QR code already used',
                    'attendance' => [
                        'name' => $attendance->name,
                        'email' => $attendance->email,
                        'event_title' => $attendance->event->title,
                        'used_at' => $attendance->used_at,
                        'checked_in_by' => $attendance->checked_in_by
                    ]
                ], 409);
            }

            // Check if event is active
            if (!$attendance->event->is_active) {
                return response()->json([
                    'success' => false,
                    'message' => 'Event is not active'
                ], 403);
            }

            // Mark as used
            $attendance->update([
                'used_at' => now(),
                'checked_in_by' => Auth::guard('admin')->user()->name ?? 'Scanner'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Attendance validated successfully',
                'attendance' => [
                    'name' => $attendance->name,
                    'email' => $attendance->email,
                    'event_title' => $attendance->event->title,
                    'event_location' => $attendance->event->location,
                    'event_date' => $attendance->event->start_date,
                    'checked_in_at' => $attendance->used_at->format('Y-m-d H:i:s'),
                    'checked_in_by' => $attendance->checked_in_by
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error processing QR code: ' . $e->getMessage()
            ], 500);
        }
    }
}
