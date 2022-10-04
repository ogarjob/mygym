<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

use App\Http\Controllers\AuthController;

use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/dashboard', function () {
    return view('users.dashboard');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});


Route::get('/users', [UserController::class, 'index']);

// Route::get('/users/profile', [UserController::class, 'show']);

Route::get('/{user}'/*'/users/profile/{user}'*/, function(User $user){

    return view('users.profile', ['user' => $user]);
});

Route::post('/register', [UserController::class, 'store']);

Route::post('/login', [AuthController::class, 'authenticate']);


