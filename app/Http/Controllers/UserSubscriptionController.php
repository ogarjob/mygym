<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscription;

class UserSubscriptionController extends Controller
{
    public function index(User $user)
    {
        $this->authorize('view', $user);

        return view('users.subscriptions.index', ['subscriptions' => $user->subscriptions]);
    }


    public function show(User $user, $subscription)
    {
        // $this->authorize('view-any', User::class);
        return view('users.subscriptions.show', ['subscription' => Subscription::find($subscription)]);
    }
}
