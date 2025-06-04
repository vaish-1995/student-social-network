<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ForumPostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;

// Language switch (no auth required)
Route::get('/lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'fr'])) {
        abort(400);
    }
    session(['locale' => $locale]);
    return back();
})->name('lang.switch');

// Authentication routes (guest only)
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showLogin'])->name('home');
    Route::get('/home', [AuthController::class, 'showLogin']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Registration
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    // Forgot password
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPassword'])->name('forgot.password');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'handleForgotPassword'])->name('forgot.password.submit');

    // Reset password via token
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
});

// Logout route (auth only)
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Forum resource routes
    Route::resource('forum', ForumPostController::class);

    // User profile routes
    Route::get('user/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('user/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Change password
    Route::get('user/password/change', [ForgotPasswordController::class, 'showChangePassword'])->name('change.password');
    Route::post('user/password/change', [ForgotPasswordController::class, 'handleChangePassword'])->name('change.password.submit');

    // Static pages
    Route::view('/about', 'about')->name('about');
    Route::view('/services', 'services')->name('services');
    Route::view('/home', 'home')->name('dashboard');
});

// // Dynamic password route: sends user to appropriate page based on auth status
// Route::get('/password', function () {
//     return auth()->check()
//         ? redirect()->route('change.password')   // logged in -> change password
//         : redirect()->route('forgot.password');  // guest -> forgot password
// })->name('password.route');
