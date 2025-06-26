<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ProductTransactionController;
use App\Http\Controllers\TopUpController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

// Auth Routes
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/outlets', function () {
    return view('outlets');
})->name('outlets');

Route::get('/products', function () {
    return view('products');
})->name('products');

Route::get('/booking/{outlet?}', [BookingController::class, 'index'])
    ->middleware('auth')->name('booking');

Route::get('/history/product/{code}', [ProductTransactionController::class, 'show'])
    ->middleware('auth')->name('product.detail');

Route::get('/history/booking/{bookingCode}', [BookingController::class, 'show'])
    ->middleware('auth')->name('booking.detail');

Route::get('/history/topup/{orderId}', [TopUpController::class, 'show'])
    ->middleware('auth')->name('topup.detail');

Route::get('/qr/{code}', [DownloadController::class, 'downloadQr'])
    ->middleware('auth')->name('download.qr');

Route::get('/profile', function () {
    return view('profile');
})->middleware('auth')->name('profile');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/wallet', function () {
    return view('wallet.wallet');
})->middleware('auth')->name('wallet');