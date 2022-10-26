<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Subscription;

class UserSubscriptionController extends Controller
{
    public function index(User $user)
    {
        $this->authorize('view', $user);

        return view('users.subscriptions.index', ['subscriptions' => $user->subscriptions]);
    }


    public function store(User $user)
    {
        $this->authorize('subscribe', $user);

        $attributes = request()->validate([
            'date' => 'required|date',
            'amount' => 'required',
        ]);
        $attributes['user_id'] = $user->id;
        $attributes['reference'] = strToUpper(Str::random(15));
        Subscription::create($attributes);

        return back()->with(['message' => 'Subscription was successful']);
    }
}
