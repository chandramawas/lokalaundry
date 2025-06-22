<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/outlets', function () {
    return view('outlets');
})->name('outlets');

Route::get('/products', function () {
    return view('products');
})->name('products');

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