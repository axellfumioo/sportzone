<?php

use App\Http\Controllers\AIController;
use App\Http\Controllers\ChatTokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/handler/ai/receive', [AIController::class, 'receiveMessage']);
Route::get('/chat-token', [ChatTokenController::class, 'getToken']);
