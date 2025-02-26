<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [App\Http\Controllers\api\UserController::class, "register"]);
Route::post('/login', [App\Http\Controllers\api\UserController::class, "login"]);
Route::get('/logout', [App\Http\Controllers\api\UserController::class, "logout"]);
Route::get('/getUsers', [App\Http\Controllers\api\UserController::class, "getUsers"]);
Route::get('/getTokens', [App\Http\Controllers\api\UserController::class, "getTokens"]);


