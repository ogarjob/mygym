<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserSubscriptionController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::post('/login',       [AuthController::class, 'login'])->name('login');
    Route::post('/register',    [RegisterController::class, 'store'])->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::resource('users',                UserController::class)->except('create');
    Route::resource('users.subscriptions',  UserSubscriptionController::class)->only('store');
});
