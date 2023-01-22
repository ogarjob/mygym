<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreSubscriptionRequest;
use App\Models\User;
use Illuminate\Http\Response;

class UserSubscriptionController extends Controller
{
    public function store(StoreSubscriptionRequest $request, User $user)
    {
        $subscription = $user->subscriptions()->create($request->validated());
//        dd($subscription);
        return Response::api([
            'message'   => "Payment Initialized",
            'data'      => compact('subscription'),
        ]);
    }
}
