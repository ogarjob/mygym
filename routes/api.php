<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserSubscriptionController;
use App\Http\Controllers\Api\SubscriptionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VerifySubscriptionController;


Route::middleware('guest')->group(function () {
    Route::post('/login',       [AuthController::class, 'login'])->name('login');
    Route::post('/register',    [RegisterController::class, 'store'])->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::resource('users',                UserController::class)->only('store', 'update', 'destroy');
    Route::resource('users.subscriptions',  UserSubscriptionController::class)->only('store');
//    Route::resource('subscriptions',        SubscriptionController::class)->only(['show']);
    Route::post('/subscription/{subscription}/verify', VerifySubscriptionController::class)->name('subscription.verify');
    Route::post('/subscription/{subscription}/retry',       [SubscriptionController::class, 'show'])->name('subscriptions.show');

});
