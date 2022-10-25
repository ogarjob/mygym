<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserSubscriptionController;
use App\Models\User;

Route::middleware('guest')->group(function () {
    Route::post('/register', [UserController::class, 'store'])  ->name('users.store');
    Route::get('/register', [UserController::class, 'create'])  ->name('users.create');
    Route::view('/login', 'auth.login')                         ->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'users.dashboard') ->name('dashboard');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::post('/photo/{user}', [PhotoController::class, 'update'])->name('photo.update');
    Route::delete('/users/delete/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

    Route::get('/users/{user}/subscriptions', [UserSubscriptionController::class, 'index'])->name('users-subscriptions.index');    

    Route::middleware('admin')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        // Route::get('/users/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions.index');
        Route::get('/userss/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions.index');    
    });
});





