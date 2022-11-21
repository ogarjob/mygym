<?php

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

/**
 * @param  null  $key
 * @return Authenticatable|User|null
 */
function user($key = null)
{
    $user = Auth::user();

    return $key ? $user?->{$key} : $user;
}
