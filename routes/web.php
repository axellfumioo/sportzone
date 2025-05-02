<?php

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

Route::get('/sports/{sports}', [SportsController::class, 'view']);
Route::get('/book/{arena}', function () {
    return view('book.index');
});
Route::get('/ai', function () {
    return view('tanyaai.index');
});
