<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
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
    // ========================================== about
    Route::view('about', 'front.about')->name('about');
    // ========================================== contact
    Route::view('contact', 'front.contact')->name('contact');
    // ========================================== projects
    Route::view('projects', 'front.projects')->name('projects');
    // ========================================== services
    Route::view('services', 'front.services')->name('services');
    // ========================================== team
    Route::view('team', 'front.team')->name('team');
    // ========================================== testimonials
    Route::view('testimonials', 'front.testimonials')->name('testimonials');
});


/**
 *  Admin Routes
 */
Route::prefix('/admin')->name('admin.')->group(function (){
    // ========================================== admin index
    Route::view('', 'admin.index')->name('index');
});
