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
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users,email',
            'username' => 'required|max:255|min:3|unique:users,username',
            'gender' => 'required',
            'password' => 'required|max:255|min:3',
        ]);

        $user = User::create($attributes);

        return redirect('login')->with('message', 'Your account has been Registered. Use your details to login');
    }
    
    public function show(User $user)
    {
        // dd($user->id);
        if ($user->id != Auth::id() && ! Auth::user('is_admin')) exit('This action is unauthorized');

        return view('users.profile', ['user' => $user]);
    }
    
    public function update(User $user)
    {        
        request()->validate([
            'email'     => 'email',
            'username'  => 'alpha_num'
        ]);

        $user->update(request()->all());
        
        return back()->with('message', 'Update was successful');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('users')->with('message', 'User has been deleted');
    }
}
