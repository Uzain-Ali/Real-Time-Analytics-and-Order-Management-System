<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

// 🔹 Built-in Auth Routes (login, register, etc.)
Auth::routes();

// 🔐 Protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/order/place', [OrderController::class, 'placeOrder']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
