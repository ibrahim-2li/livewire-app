<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\authController;
use App\Http\Controllers\LanguageController;

Route::get('/language/{locale}', [LanguageController::class, 'swap'])->name('language.swap');

// Route::get('/w', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
Route::get('/', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::post('/events/{event}/register', [EventController::class, 'register'])->name('events.register');
// Route::prefix('/')->name('front.')->group(function (){
    // ========================================== index
    // Route::view('', 'front.index')->name('index');
    // // ========================================== about
    // Route::view('about', 'front.about')->name('about');
    // // ========================================== contact
    // Route::view('contact', 'front.contact')->name('contact');
    // // ========================================== projects
    // Route::view('projects', 'front.projects')->name('projects');
    // // ========================================== services
    // Route::view('services', 'front.services')->name('services');
    // // ========================================== team
    // Route::view('team', 'front.team')->name('team');
    // // ========================================== testimonials
    // Route::view('testimonials', 'front.testimonials')->name('testimonials');
// });

/**
 *  Admin Routes
 */
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
    Route::middleware(['auth:admin', 'admin.role:ADMIN'])->group(function () {
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
        Route::middleware('admin.role:ADMIN,SCANNER')->group(function () {
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
});
Route::fallback(function () {
    return view('admin.error');
});

Route::get('/download-qr/{attendance}', function (App\Models\Attendance $attendance) {
    // Allow admins to download any QR code, or users to download their own
    if (auth('admin')->check()) {
        // Admin can download any QR code - no restrictions
    } elseif (auth()->check() && $attendance->attendee_email === auth()->user()->email) {
        // User can download their own QR code
    } elseif (auth()->check() && $attendance->attendee_email !== auth()->user()->email) {
        abort(403, 'ليس لديك صلاحية لتحميل هذا الرمز');
    } else {
        abort(403, 'يجب تسجيل الدخول أولاً');
    }

    $qrData = json_encode([
        'type' => 'attendance',
        'event_id' => $attendance->event_id,
        'token' => $attendance->qr_token,
        'attendee_name' => $attendance->attendee_name,
        'attendee_email' => $attendance->attendee_email,
    ]);

    $qrCode = \SimpleSoftwareIO\QrCode\Facades\QrCode::size(300)
        ->format('svg')
        ->generate($qrData);

    $filename = 'qr-code-'.Str::slug($attendance->event->title).'-'.$attendance->qr_token.'.svg';

    return response($qrCode)
        ->header('Content-Type', 'image/svg+xml')
        ->header('Content-Disposition', 'attachment; filename="'.$filename.'"');
})->name('download-qr');

Route::get('/view-qr/{attendance}', function (App\Models\Attendance $attendance) {
    // Allow admins to view any QR code, or users to view their own
    if (auth('admin')->check()) {
        // Admin can view any QR code - no restrictions
    } elseif (auth()->check() && $attendance->attendee_email === auth()->user()->email) {
        // User can view their own QR code
    } elseif (auth()->check() && $attendance->attendee_email !== auth()->user()->email) {
        abort(403, 'ليس لديك صلاحية لعرض هذا الرمز');
    } else {
        abort(403, 'يجب تسجيل الدخول أولاً');
    }

    $qrData = json_encode([
        'type' => 'attendance',
        'event_id' => $attendance->event_id,
        'token' => $attendance->qr_token,
        'attendee_name' => $attendance->attendee_name,
        'attendee_email' => $attendance->attendee_email,
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

