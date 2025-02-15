<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PhotoController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserSubscriptionController;
use App\Http\Controllers\Api\VerifySubscriptionController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::post('/login',       [AuthController::class, 'login'])->name('login');
    Route::post('/register',    [RegisterController::class, 'store'])->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::controller(PhotoController::class)->group(function () {
        Route::put('users/photo/{user}',    'update')->name('users.photo.update');
        Route::delete('users/photo/{user}', 'destroy')->name('users.photo.destroy');
    });
    Route::resource('users',UserController::class)->only('store', 'update', 'destroy');
    Route::resource('users.subscriptions', UserSubscriptionController::class)->only('store');
    Route::post('/subscription/{subscription}/verify', VerifySubscriptionController::class)->name('subscription.verify');
    Route::post('/subscription/{subscription}/retry', [SubscriptionController::class, 'show'])->name('subscriptions.show');

});
