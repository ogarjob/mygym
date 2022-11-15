<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserSubscriptionController;
use App\Http\Controllers\RegisterController;
use App\Models\User;

Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::view('/login', 'auth.login')                         ->name('login');
    Route::post('/register', [RegisterController::class, 'store'])  ->name('register.store');
    Route::get('/register', [RegisterController::class, 'create'])  ->name('register.create');
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
            Route::post('/users',            'store')    ->name('store');
            Route::put('/users/{user}',     'update')   ->name('update');
            Route::delete('/users/{user}',  'destroy')  ->name('destroy');
        });
    });

    Route::resource('users.subscriptions', UserSubscriptionController::class)->only(['index', 'store']);
    // Route::controller(UserSubscriptionController::class)->group(function () {
    //     Route::name('users.subscriptions.')->group(function () {
    //         Route::get('/users/{user}/subscriptions',  'index') ->name('index');
    //         Route::post('/users/{user}/subscriptions', 'store') ->name('store');
    //     });
    // });
    
    Route::controller(SubscriptionController::class)->name('subscriptions.')->group(function () {
        Route::get('/subscriptions', 'index')->name('index');
        Route::get('/subscriptions/{subscription}', 'show') ->name('show');
        Route::put('/subscriptions/{subscription}', 'update')->name('update');
    });
});





