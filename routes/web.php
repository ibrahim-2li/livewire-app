<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// require __DIR__.'/auth.php';

Route::prefix('/')->name('front.')->group(function (){
    // ========================================== index
    Route::view('', 'front.index')->name('index');
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
});

/**
 *  Admin Routes
 */
Route::prefix('/admin/')->name('admin.')->group(function (){
    Route::middleware('auth:admin')->group(function () {
        // ========================================== Admin index
        Route::view('', 'admin.index')->name('index');
        // ========================================== Skills index
        Route::view('skills', 'admin.skills.index')->name('skills');
        // ========================================== subscribers index
        Route::view('subscribers', 'admin.subscribers.index')->name('subscribers');
        // ========================================== counters index
        Route::view('counters', 'admin.counters.index')->name('counters');
        // ========================================== Services index
        Route::view('services', 'admin.services.index')->name('services');
        // ========================================== Messages index
        Route::view('messages', 'admin.messages.index')->name('messages');
        // ========================================== Categories index
        Route::view('categories', 'admin.categories.index')->name('categories');
        // ========================================== Projects index
        Route::view('projects', 'admin.projects.index')->name('projects');
        // ========================================== Members index
        Route::view('members', 'admin.members.index')->name('members');
         // ========================================== Account index
         Route::view('account', 'admin.account.index')->name('account');
        // ========================================== settings index
        Route::view('settings', 'admin.settings.index')->name('settings');
    });

    // ========================================== login index
    Route::view('/login', 'admin.auth.login')->middleware('guest:admin')->name('login');
});
Route::fallback(function () {
    return view('admin.error');
});

