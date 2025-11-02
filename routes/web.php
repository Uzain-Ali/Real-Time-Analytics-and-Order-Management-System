<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['web', 'auth'])->group(function () {
    Route::post('/orders', [OrderController::class, 'store']);
    Route::put('/orders/{id}', [OrderController::class, 'updateStatus']);
    Route::get('/orders/active', [OrderController::class, 'activeOrders']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');