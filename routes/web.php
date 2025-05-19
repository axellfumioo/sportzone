<?php

use App\Http\Controllers\AIController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SportsController;
use App\Http\Controllers\ApajaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/booking', function () {
    return view('booking');
});
Route::get('/about', function () {
    return view('about.index');
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
Route::get('/profile', [AuthController::class, 'profile']);


Route::get('/promotion', [PromoController::class, 'view']);
Route::get('/order/{id}', [OrderController::class, 'viewOrder']);
Route::get('/sports/{sports}', [SportsController::class, 'view']);
Route::get('/book/{slug}', [BookController::class, 'view']);
Route::post('/order/save', [OrderController::class, 'store']);
Route::get('/auth/logout', [AuthController::class, 'register']);
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::any('/transaction/callback', [OrderController::class, 'callback']);
