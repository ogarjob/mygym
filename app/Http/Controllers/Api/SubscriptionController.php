<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\User;

class SubscriptionController extends Controller
{
    public function show(Subscription $subscription)
    {
        return Response::api([
            'message'   => "Payment Initialized",
            'data'      => compact('subscription'),
        ]);
    }

}
