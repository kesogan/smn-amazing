<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'email', 'password','lastName','phoneNumber'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    public function bought_art()
    {
        return $this->belongsToMany('App\Models\Art')->withTimestamps()->withPivot('quantity', 'sell_price');
    }

    public function events()
    {
        return $this->hasMany('App\Models\Event', 'user_id');
    }

    public function cart()
    {
        return $this->hasOne('App\Models\Cart', 'user_id');
    }

}
