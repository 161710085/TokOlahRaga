<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function cart()
    {
        return $this->hasMany('App\cart','id_cart');
    }
    public function checkout()
    {
        return $this->hasMany('App\checkout','id_checkout');
    }
    public function oreder_status()
    {
        return $this->hasMany('App\oreder_status','id_oreder_status');
    }
}
