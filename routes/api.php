<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSubscriptionController;


Route::middleware('guest')->group(function () {
    Route::post('/login',       [AuthController::class, 'login'])->name('login');
    Route::post('/register',    [RegisterController::class, 'store'])->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::resource('users',                UserController::class)->except('create');
    Route::resource('users.subscriptions',  UserSubscriptionController::class)->only('store');
});
