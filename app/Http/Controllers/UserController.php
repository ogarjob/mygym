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

    public function store()
    {
        $attributes = request()->validate([
            'name'      => 'required|max:255',
            'email'     => 'required|max:255|unique:users,email',
            'username'  => 'required|max:255|min:3|unique:users,username',
            'gender'    => 'required',
            'type'      => 'required',
        ]);
        User::create($attributes);

        return to_route("users.index")->with('message', 'User has been registered successfully.');
    }
    
    public function show(User $user)
    {
        return view('users.profile', ['user' => $user]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update(request()->except('password_confirmation'));
        
        return back()->with('message', 'Update was successful');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return to_route('users.index')->with('message', 'User has been deleted');
    }
}
