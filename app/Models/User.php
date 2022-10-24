<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'username',
    //     'gender',
    //     'password',
    // ];

    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function password(): Attribute
    {
        return Attribute::set(fn ($value) => bcrypt($value));
    }


    public function photo()
    {
        if (!$this->photo) {
			return asset('img/undraw_profile.svg');
		}

        return asset($this->photo);
    }
 

    public function isAdmin()
	{
		return $this->type == 2;
	}


	public function isMember()
	{
		return ! $this->isAdmin();
	}
}
