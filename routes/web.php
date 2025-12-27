<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:buyer'])->get('/buyer', function () {
    return view('buyer');
})->name('buyer.dashboard');

Route::middleware(['auth', 'role:seller'])
    ->prefix('seller')
    ->name('seller.')
    ->group(function () {
        Route::get('/', function () {
            return view('seller');
        })->name('dashboard');

        Route::get('products/search', [ProductController::class, 'search'])->name('products.search');

        //index()
        // create()
        // store()
        // edit()
        // update()
        // destroy()
        Route::resource('products', ProductController::class)->except(['show']);
        Route::resource('orders', OrderController::class)->except(['show']);
    });

    
