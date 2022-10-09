<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function store()
    {
        $user = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users,email',
            'username' => 'required|max:255|min:3|unique:users,username',
            'gender' => 'required',
            'password' => 'required|max:255|min:3',
        ]);

        User::create($user);

        session()->flash('success', 'Your account has been created.');

        return redirect("dashboard");
    }
    
    public function show(User $user)
    {
        return view('users.profile', ['user' => $user]);
    }
    
    public function update(User $user)
    {        
        $user->update(request()->all());

        return redirect($user->id);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
