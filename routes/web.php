<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/outlet', function () {
    return view('outlet');
})->name('outlet');

Route::get('/product', function () {
    return ('Coming Soon');
})->name('product');

Route::get('/booking', function () {
    return ('Coming Soon');
})->name('booking');

Route::get('/profile', function () {
    return view('profile');
})->middleware('auth')->name('profile');

// Auth Routes
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');