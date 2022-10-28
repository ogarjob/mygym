<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserSubscriptionController;
use App\Models\User;

Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::view('/login', 'auth.login')                         ->name('login');
    Route::post('/register', [UserController::class, 'store'])  ->name('users.store');
    Route::get('/register', [UserController::class, 'create'])  ->name('users.create');
});

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'users.dashboard') ->name('dashboard');
    Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');
    Route::put('users/photo/{user}', [PhotoController::class, 'update'])->name('users.photo.update');
    Route::delete('users/photo/{user}', [PhotoController::class, 'destroy'])->name('users.photo.destroy');
    
    Route::controller(UserController::class)->group(function () {
        Route::name('users.')->group(function () {
            Route::get('/users',            'index')    ->name('index');
            Route::get('/users/{user}',     'show')     ->name('show');
            Route::put('/users/{user}',     'update')   ->name('update');
            Route::delete('/users/{user}',  'destroy')  ->name('destroy');
        });
    });

    Route::controller(UserSubscriptionController::class)->group(function () {
        Route::name('users.subscriptions.')->group(function () {
            Route::get('/users/{user}/subscriptions',  'index')->name('index');
            Route::post('/users/{user}/subscriptions', 'store')->name('store');
        });
    });
    
    Route::controller(SubscriptionController::class)->group(function () {
        Route::name('subscriptions.')->group(function () {
            // Route::get('/users/subscriptions', 'index'])->name('subscriptions.index');
            Route::get('/subscriptions',                        'index')->name('index');
            Route::get('/users/subscriptions/{subscription}',   'show') ->name('show');
            Route::put('/users/subscriptions/{subscription}',   'update')->name('update');
        });
    });
});





