<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/outlet', function () {
    return ('Coming Soon');
})->name('outlet');

Route::get('/product', function () {
    return ('Coming Soon');
})->name('product');

Route::get('/booking', function () {
    return ('Coming Soon');
})->name('booking');

// Auth Routes
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Routes with Auth Middleware
Route::middleware(['auth'])->group(function () {
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
});