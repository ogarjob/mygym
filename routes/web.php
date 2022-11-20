<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSubscriptionController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login',       [AuthController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
});

Route::middleware('auth')->group(function () {
    Route::redirect('/',      'dashboard');
    Route::view('/dashboard', 'users.dashboard')->name('dashboard');
    Route::get('/logout',     LogoutController::class)->name('logout');

    Route::controller(PhotoController::class)->group(function () {
        Route::put('users/photo/{user}',    'update')->name('users.photo.update');
        Route::delete('users/photo/{user}', 'destroy')->name('users.photo.destroy');
    });

//    Route::controller(UserController::class)->group(function () {
//        Route::name('users.')->group(function () {
//            Route::get('/users',            'index')    ->name('index');
//            Route::get('/users/{user}',     'show')     ->name('show');
//            Route::post('/users',            'store')    ->name('store');
//            Route::put('/users/{user}',     'update')   ->name('update');
//            Route::delete('/users/{user}',  'destroy')  ->name('destroy');
//        });
//    });

    Route::resource('users',                UserController::class)->except('create');
    Route::resource('subscriptions',        SubscriptionController::class)->only(['index', 'show']);
    Route::resource('users.subscriptions',  UserSubscriptionController::class)->only('index');

    Route::controller(SubscriptionController::class)->name('subscriptions.')->group(function () {
        Route::get('/subscriptions', 'index')->name('index');
        Route::get('/subscriptions/{subscription}', 'show') ->name('show');
        Route::put('/subscriptions/{subscription}', 'update')->name('update');
    });
});





