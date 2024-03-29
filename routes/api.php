<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LicenceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public routes of authtication
Route::controller(LoginRegisterController::class)->group(function() {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

// Public routes
Route::controller(ProductController::class)->group(function() {
    Route::get('/products', 'index');
    Route::get('/products/{id}', 'show');
    Route::get('/products/search/{name}', 'search');
});

// Protected routes
Route::middleware('auth:sanctum')->group( function () {
    Route::post('/logout', [LoginRegisterController::class, 'logout']);
    Route::get('/user', [LoginRegisterController::class, 'me']);

    Route::controller(ProductController::class)->group(function() {
        Route::post('/products', 'store');
        Route::post('/products/{id}', 'update');
        Route::delete('/products/{id}', 'destroy');
    });

    Route::controller(UserController::class)->group(function() {
        Route::get('/users', 'all');
    });

    Route::controller(LicenceController::class)->group(function() {
        Route::get('/licences', 'index');
        Route::post('/licences', 'store');
        Route::get('/licences/{id}', 'show');
        Route::post('/licences/{id}', 'update');
        Route::delete('/licences/{id}', 'destroy');
    });
    
});