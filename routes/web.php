<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/',[AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register',[AuthController::class, 'registrationForm']);

Route::group(['middleware'=>'auth'], function() {
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/create',[ProductController::class, 'create']);

    Route::get('/logout', [AuthController::class, 'logout']);
});
Route::post('/register', [AuthController::class, 'register']);
