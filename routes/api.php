<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;

Route::post('login', [AuthController::class, 'login']);

Route::middleware(['auth', 'role:seller'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('orders', OrderController::class);
});
