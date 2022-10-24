<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::latest()->get();
        return view('users.subscriptions.index', compact('subscriptions'));
    }
}
