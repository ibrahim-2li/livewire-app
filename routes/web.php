<?php

use App\Models\Attendance;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\DashboardController;

Route::get('/language/{locale}', [LanguageController::class, 'swap'])->name('language.swap');


require __DIR__.'/auth.php';
Route::get('/', [EventController::class, 'index'])->name('events.index');
Route::get('/about', [EventController::class, 'about'])->name('events.about');
Route::get('/contact', [EventController::class, 'contact'])->name('events.contact');
Route::post('/events/{event}/register-existing', [EventController::class, 'existing_register'])->name('events.existing_register');
Route::post('/events/{event}/register', [EventController::class, 'register'])->name('events.register');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

 //  Admin Routes

Route::prefix('/admin/')->name('admin.')->group(function (){

    // Routes accessible by all authenticated users (USER, ADMIN, SCANNER roles)
    Route::middleware('auth:admin')->group(function () {
        // ========================================== Dashboard (accessible by all)
        Route::get('', [DashboardController::class, 'index'])->name('index');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // ========================================== My Attendance (accessible by all)
        Route::view('my-attendances', 'admin.my-attendances.index')->name('my-attendances');

        // ========================================== Account (accessible by all)
        Route::view('account', 'admin.account.index')->name('account');

        // ========================================== logout (accessible by all)
        Route::post('logout', function () {
            auth('admin')->logout();
            return redirect()->route('admin.login');
        })->name('logout');
    });

    // Routes accessible only by ADMIN role
    Route::middleware(['auth:admin', 'admin.role:ADMIN,SUPERVISOR'])->group(function () {
        // ========================================== All Attendances (Admin only)
        Route::view('attendances', 'admin.attendances.index')->name('attendances');

        // ========================================== Messages (Admin only)
        Route::view('messages', 'admin.messages.index')->name('messages');

         // ========================================== users (Admin only)
         Route::view('users', 'admin.users.index')->name('users');

        // ========================================== Events (Admin only)
        Route::view('events', 'admin.events.index')->name('events');

        // ========================================== Settings (Admin only)
        Route::view('settings', 'admin.settings.index')->name('settings');
    });

    // Routes accessible by ADMIN and SCANNER roles
    Route::middleware(['auth:admin'])->group(function () {
        Route::middleware('admin.role:ADMIN,SCANNER,SUPERVISOR')->group(function () {
            // ========================================== QR Scanner (Admin + Scanner only)
            Route::get('qr-scanner', [App\Http\Controllers\QRScannerController::class, 'index'])->name('qr-scanner');
            Route::post('validate-qr', [App\Http\Controllers\QRScannerController::class, 'validateQR'])->name('validate-qr');
        });
    });

    // ========================================== login index
    Route::view('/login', 'admin.auth.login')->middleware('guest:admin')->name('login');
    // ========================================== register index
    Route::get('/register', [authController::class, 'register'])->middleware('guest:admin')->name('register');
    Route::post('/register', [authController::class, 'store'])->middleware('guest:admin')->name('register.store');
    // ========================================== forgot password
    Route::view('/forgot-password', 'admin.auth.forgot-password')->middleware('guest:admin')->name('password.request');
});
Route::fallback(function () {
    return view('admin.errors.error');
});

Route::get('/download-qr/{attendance}', function (Attendance $attendance) {
    // Check if authenticated via admin guard (all users use this)
    if (!auth('admin')->check()) {
        return response()->view('admin.errors.403', [], 403);
    }

    // Load relationships
    $attendance->load(['user', 'event']);

    $user = auth('admin')->user();
    $userRole = $user->role;

    // ADMIN and SCANNER roles can download any QR code
    if ($userRole === \App\Models\Admin::ROLE_ADMIN || $userRole === \App\Models\Admin::ROLE_SCANNER || $userRole === \App\Models\Admin::ROLE_SUPERVISOR) {
        // Allow access - continue
    }
    // USER role can only download their own QR code (must match admin_id)
    elseif ($userRole === \App\Models\Admin::ROLE_USER) {
        // Use loose comparison to handle type differences (int vs string)
        if ((int) $user->id !== (int) $attendance->admin_id) {
            return response()->view('admin.errors.403', [], 403);
        }
    }
    // Unknown role - deny access
    else {
        return response()->view('admin.errors.403', [], 403);
    }

    $qrData = json_encode([
        'type' => 'attendance',
        'event_id' => $attendance->event_id,
        'token' => $attendance->qr_token,
        'name' => $attendance->user->name,
        'email' => $attendance->user->email,
    ]);

    $qrCode = \SimpleSoftwareIO\QrCode\Facades\QrCode::size(300)
        ->format('svg')
        ->generate($qrData);

    $filename = 'qr-code-'.Str::slug($attendance->event->title).'-'.$attendance->qr_token.'.svg';

    return response($qrCode)
        ->header('Content-Type', 'image/svg+xml')
        ->header('Content-Disposition', 'attachment; filename="'.$filename.'"');
})->name('download-qr');

Route::get('/view-qr/{attendance}', function (Attendance $attendance) {
    // Check if authenticated via admin guard (all users use this)
    if (!auth('admin')->check()) {
        return response()->view('admin.errors.403', [], 403);
    }

    // Load relationships
    $attendance->load(['user', 'event']);

    $user = auth('admin')->user();
    $userRole = $user->role;

    // ADMIN and SCANNER roles can view any QR code
    if ($userRole === \App\Models\Admin::ROLE_ADMIN || $userRole === \App\Models\Admin::ROLE_SCANNER || $userRole === \App\Models\Admin::ROLE_SUPERVISOR) {
        // Allow access - continue
    }
    // USER role can only view their own QR code (must match admin_id)
    elseif ($userRole === \App\Models\Admin::ROLE_USER) {
        // Use loose comparison to handle type differences (int vs string)
        if ((int) $user->id !== (int) $attendance->admin_id) {
            return response()->view('admin.errors.403', [], 403);
        }
    }
    // Unknown role - deny access
    else {
        return response()->view('admin.errors.403', [], 403);
    }

    $qrData = json_encode([
        'type' => 'attendance',
        'event_id' => $attendance->event_id,
        'token' => $attendance->qr_token,
        'name' => $attendance->user->name,
        'email' => $attendance->user->email,
    ]);

    $qrCode = \SimpleSoftwareIO\QrCode\Facades\QrCode::size(250)
        ->format('svg')
        ->generate($qrData);

    return view('qr-code-view', [
        'qrCode' => $qrCode,
        'attendance' => $attendance,
        'event' => $attendance->event,
    ]);
})->name('view-qr');

