<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Illuminate\Support\Str;
use App\Models\User;

class SubscriptionController extends Controller
{
    public function index()
    {
        // $this->authorize('viewAny');

        return view('users.subscriptions.index', ['subscriptions' => Subscription::latest()->get()]);
    }

    public function store(User $user)
    {
        $attributes = request()->validate([
            'date' => 'required|date',
            'amount' => 'required',
        ]);
        $attributes['user_id'] = auth()->id();
        $attributes['reference'] = strToUpper(Str::random(15));
        Subscription::create($attributes);

        return back()->with(['message' => 'Subscription was successful']);
    }
}
