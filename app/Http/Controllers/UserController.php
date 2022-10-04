<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function store(Request $request)
    {
        User::create($request->all());

        return redirect("dashboard");
    }

    // public function show(User $user)
    // {
    //     return view('users.profile', ['user' => $user]);
    // }
}
