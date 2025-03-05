<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    Route::get('/customer', [CustomerController::class, 'index']);
    Route::post('/customer', [CustomerController::class, 'store']);
    Route::get('/customer/{customer}', [CustomerController::class, 'show']);

    Route::get('/table', [TableController::class, 'index']);
    Route::post('/table', [TableController::class, 'store']);
    Route::get('/table/{table}', [TableController::class, 'show']);

    Route::get('/type', [TypeController::class, 'index']);
    Route::post('/type', [TypeController::class, 'store']);
    Route::get('/type/{type}', [TypeController::class, 'show']);

    Route::get('/drink', [DrinkController::class, 'index']);
    Route::post('/drink', [DrinkController::class, 'store']);
    Route::get('/drink/{drink}', [DrinkController::class, 'show']);

    Route::get('/menu', [MenuController::class, 'index']);
    Route::post('/menu', [MenuController::class, 'store']);
    Route::get('/menu/{menu}', [MenuController::class, 'show']);

    Route::post('/register', [UserController::class, 'register']);
    Route::post('/logout', [UserController::class, 'logout']);
    Route::post('/login', [UserController::class, 'login']);
});
