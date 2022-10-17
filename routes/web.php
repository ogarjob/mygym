<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\AuthController;
use App\Models\User;


// Route::get('/', function () {
//     return view('index');
// });

Route::middleware('guest')->group(function () {
    Route::post('/register', [UserController::class, 'store'])  ->name('users.store');
    Route::get('/register', [UserController::class, 'create'])  ->name('users.create');
    Route::view('/login', 'auth.login')                         ->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});
Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'users.dashboard');
    Route::get('/users',                [UserController::class, 'index'])   ->name('users.index');
    Route::get('/users/{user}',         [UserController::class, 'show'])    ->name('users.show');
    Route::post('/users/{user}',        [UserController::class, 'update'])  ->name('users.update');
    Route::get('/users/delete/{user}',  [UserController::class, 'destroy']) ->name('users.destroy');
    Route::post('/photo/{user}',        [PhotoController::class, 'update'])  ->name('photo.update');
    Route::get('/logout', [AuthController::class, 'destroy']);

});





