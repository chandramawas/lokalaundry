<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ProductTransactionController;
use App\Http\Controllers\TopUpController;
use App\Livewire\Simulator\SimulatorPage;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
})->name('home');

// Auth Routes
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Email Verification
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('success', 'Link verifikasi telah dikirim ke email kamu!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Forgot Password Routes
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Reset Password Routes
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/outlets', function () {
    return view('outlets');
})->name('outlets');

Route::get('/products', function () {
    return view('products');
})->name('products');


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Middleware User sudah Verify
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/booking/{outlet?}', [BookingController::class, 'index'])
        ->name('booking');

    Route::get('/activity/product/{code}', [ProductTransactionController::class, 'show'])
        ->name('product.detail');

    Route::get('/activity/booking/{bookingCode}', [BookingController::class, 'show'])
        ->name('booking.detail');

    Route::get('/activity/topup/{orderId}', [TopUpController::class, 'show'])
        ->name('topup.detail');

    Route::get('activity', function () {
        return view('activity');
    })->name('activity');

    Route::get('/qr/{code}', [DownloadController::class, 'downloadQr'])
        ->name('download.qr');

    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');

    Route::get('/wallet', function () {
        return view('wallet.wallet');
    })->name('wallet');
});

Route::get('/simulator', SimulatorPage::class)->name('simulator');
