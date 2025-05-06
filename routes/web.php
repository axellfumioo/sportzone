<?php

use App\Http\Controllers\AIController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SportsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/booking', function () {
    return view('booking');
});
Route::get('/auth/login', function () {
    return view('auth.login');
});
Route::get('/auth/register', function () {
    return view('auth.register');
});
Route::get('/checkout', function () {
    return view('payment.checkout');
});
Route::get('/promotion', function () {
    return view('promotion.index');
});

Route::get('/promotion', [PromoController::class, 'view']);
Route::get('/sports/{sports}', [SportsController::class, 'view']);
Route::get('/book/{slug}', [BookController::class, 'view']);

Route::get('/ai', function () {
    return view('');
});
Route::get('/ai', [AIController::class, 'view']);
