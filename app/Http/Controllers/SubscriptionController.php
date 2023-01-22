<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\User;

class SubscriptionController extends Controller
{
    public function index()
    {
        $this->authorize('view-any', User::class);

        return view('users.subscriptions.index', ['subscriptions' => Subscription::latest()->get()]);
    }

    public function show(User $user, Subscription $subscription)
    {
        // $this->authorize('view', $subscription);
        $this->authorize('view', $user);

        return view('users.subscriptions.show', compact('subscription'));
    }

    public function update(User $user, Subscription $subscription)
    {
        $this->authorize('update', $subscription);

        // Validate Payment first

        $subscription->update(['paid_at' => now(1)]);

        return back()->with(['message' =>'Payment was successful!']);
    }
}
