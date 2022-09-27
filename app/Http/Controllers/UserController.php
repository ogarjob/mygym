<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function store()
    {
        //dd($_POST['gender']);
        $user = new User;
        $user->name = request('name');
        $user->email = request('email');
        $user->username = request('username');
        $user->gender = request('gender');
        $user->password = bcrypt(request('password'));
        $user->save();

        return redirect("index.php");
    }
}
