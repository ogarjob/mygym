<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function __construct ()
    {
        $this->authorizeResource(User::class);
    }

    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('users.profile', ['user' => $user]);
    }
}
