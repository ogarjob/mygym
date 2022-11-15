<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscription;
use App\Http\Requests\StoreSubscriptionRequest;

class UserSubscriptionController extends Controller
{
    public function index(User $user)
    {
        $this->authorize('view', $user);

        return view('users.subscriptions.index', ['subscriptions' => $user->subscriptions]);
    }

    public function store(StoreSubscriptionRequest $request, User $user)
    {
        $user->subscriptions()->create($request->validated());

        return back()->with(['message' => 'Subscription was successful']);
    }
}