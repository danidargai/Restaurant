<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\api\ResponseController;


Route::middleware('auth:sanctum')->group(function () {
    // Define routes that require authentication here

    Route::get('/customers', [CustomerController::class, 'index']);
    Route::post('/customer', [CustomerController::class, 'store']);
    Route::get('/customer/{customer}', [CustomerController::class, 'show']);

    Route::get('/tables', [TableController::class, 'index']);
    Route::post('/table', [TableController::class, 'store']);
    Route::get('/table/{table}', [TableController::class, 'show']);
    
    Route::get('/types', [TypeController::class, 'index']);
    Route::post('/type', [TypeController::class, 'store']);
    Route::get('/type/{type}', [TypeController::class, 'show']);
    
    Route::get('/drinks', [DrinkController::class, 'index']);
    Route::post('/drink', [DrinkController::class, 'store']);
    Route::get('/drink/{drink}', [DrinkController::class, 'show']);
    
    Route::get('/menus', [MenuController::class, 'index']);
    Route::post('/menu', [MenuController::class, 'store']);
    Route::get('/menu/{menu}', [MenuController::class, 'show']);

    Route::delete('/menu/{menu}', [MenuController::class, 'destroy']);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/user', [UserController::class, 'user']);


