<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }


    public function index()
    {
        $this->authorize('view-any', User::class);
        $users = User::all();

        return view('users.index', compact('users'));
    }


    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users,email',
            'username' => 'required|max:255|min:3|unique:users,username',
            'gender' => 'required',
            'password' => 'required|confirmed|max:255|min:3',
        ]);
        User::create($attributes);

        return redirect('login')->with('message', 'Your account has been Registered. Use your details to login');
    }
    

    public function show(User $user)
    {
        $this->authorize('view', $user);

        return view('users.profile', ['user' => $user]);
    }
    

    public function update(User $user)
    {
        $this->authorize('update', $user);
        request()->validate([
            'email'     => ['email', $unique = Rule::unique('users')->ignore($user)],
            'username'  => ['alpha_num', $unique],
            'password'  => ['confirmed']
        ]);
        $user->update(request()->except('password_confirmation'));
        
        return back()->with('message', 'Update was successful');
    }


    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();

        return to_route('users.index')->with('message', 'User has been deleted');
    }
}
