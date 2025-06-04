<?php

use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\LanguageController;    
use App\Http\Controllers\ForumPostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Log;



Route::get('/lang/{locale}', [LanguageController::class, 'setLanguage'])->name('lang.switch');


Route::middleware('locale')->group(function () {
    // Profile routes with localization support
    // Log::info("we are inside locale, which set to: " . app()->getLocale());

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    // Other routes that need localization...
});

Route::middleware(['auth'])->group(function () {
    Route::resource('forum', ForumPostController::class);
});


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/', [AuthController::class, 'showLogin'])->name('home');
Route::get('/home', [AuthController::class, 'showLogin'])->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');


// Forgot password form
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPassword'])->name('forgot.password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'handleForgotPassword'])->name('forgot.password.submit');
Route::get('/change-password', [ForgotPasswordController::class, 'showChangePassword'])->name('change.password');
Route::post('/change-password', [ForgotPasswordController::class, 'handleChangePassword'])->name('change.password.submit');

// Reset password form (link with token)
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');


Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::get('/about', function () {
    return view('about');
})->middleware('auth');

Route::get('/services', function () {
    return view('services');
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Route::get('/password/change', [ForgotPasswordController::class, 'showChangePassword'])->name('change.passwords');
    // Route::post('/password/change', [ForgotPasswordController::class, 'handleChangePassword'])->name('change.password.submit');
});


Route::get('/forum/{forum}/edit', [ForumPostController::class, 'edit'])
     ->name('forum.edit');
