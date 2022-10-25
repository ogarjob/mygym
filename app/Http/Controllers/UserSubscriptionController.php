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
}
