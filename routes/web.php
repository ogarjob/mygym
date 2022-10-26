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
    Route::post('/photo/{user}', [PhotoController::class, 'update'])->name('photo.update');
    
    Route::controller(UserController::class)->group(function () {
        Route::get('/users',            'index')    ->name('users.index');
        Route::get('/users/{user}',     'show')     ->name('users.show');
        Route::put('/users/{user}',     'update')   ->name('users.update');
        Route::delete('/users/{user}',  'destroy')  ->name('users.destroy');
    });

    Route::controller(UserSubscriptionController::class)->group(function () {
        Route::get('/users/{user}/subscriptions',         'index')->name('users.subscriptions.index');
        Route::post('/users/{user}/subscriptions',        'store')->name('users.subscriptions.store');
    });
    
    Route::controller(SubscriptionController::class)->group(function () {
        // Route::get('/users/subscriptions', 'index'])->name('subscriptions.index');
        Route::get('/subscriptions', 'index')->name('subscriptions.index');
        Route::get('/users/subscriptions/{subscription}', 'show')->name('subscriptions.show');
        Route::put('/users/subscriptions/{subscription}', 'update')->name('subscriptions.update');
    });
});





