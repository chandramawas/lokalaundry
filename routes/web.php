<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/outlet', function () {
    return ('Coming Soon');
})->name('outlet');

Route::get('/product', function () {
    return ('Coming Soon');
})->name('product');

Route::get('/booking', function () {
    return ('Coming Soon');
})->name('booking');