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

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/dashboard', function () {

    return view('users.dashboard');

})->middleware('auth');

Route::get('/users', [UserController::class, 'index'])->middleware('auth');

Route::get('/{users}', [UserController::class, 'show']);

Route::post('/{users}', [UserController::class, 'update']);

// Route::get('/{user}'/*'/users/profile/{user}'*/, function(User $user){

//     return view('users.profile', ['user' => $user]);

// })->middleware('auth');

Route::post('/register', [UserController::class, 'store']);

Route::post('/login', [AuthController::class, 'authenticate']);


