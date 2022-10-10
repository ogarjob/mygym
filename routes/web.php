<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Models\User;


// Route::get('/', function () {
//     return view('index');
// });

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', [UserController::class, 'create'])->middleware('guest');

Route::post('/register', [UserController::class, 'store'])->middleware('guest');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/dashboard', function () {

    return view('users.dashboard');

})->middleware('auth');

Route::get('/users', [UserController::class, 'index'])->middleware('auth');

Route::get('/{user}', [UserController::class, 'show'])->middleware('auth');

Route::get('/users/delete/{user}', [UserController::class, 'destroy']);

Route::post('/{user}', [UserController::class, 'update']);

// Route::get('/{user}'/*'/users/profile/{user}'*/, function(User $user){

//     return view('users.profile', ['user' => $user]);

// })->middleware('auth');



