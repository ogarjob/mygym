<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name'      => 'required|max:255',
            'email'     => 'required|max:255|unique:users,email',
            'username'  => 'required|max:255|min:3|unique:users,username',
            'gender'    => 'required',
            'password'  => 'required|confirmed|max:255|min:3',
        ]);
        User::create($attributes);

        return to_route('login')->with('message', 'Your account has been Registered. Use your details to login');
    }
}
