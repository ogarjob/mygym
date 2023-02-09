<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subscription extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['user'];

    protected $touches = ['user'];

    public static function booted()
    {
        static::creating(function ($subscription) {
            $subscription->reference ??= Str::random(15);
            $subscription->amount    ??= 1000;
        });
    }

    /**
    * Mark the subscriptions as paid.
    */
    public function markAsPaid(): static
    {
        $this->update(['paid_at' => now()]);

        return $this;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
