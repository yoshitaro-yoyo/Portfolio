<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $timestamps = false;
    protected $table = 'm_users';
    use Notifiable;

    protected $fillable = [
        'password', 
        'last_name', 
        'first_name', 
        'zipcode', 
        'prefecture', 
        'municipality', 
        'address', 
        'apartments', 
        'email', 
        'phone_number', 
        'company_name', 
    ];

    protected $hidden = [
        'password', 'remember_token', 
    ];

    protected $casts = [
        'email_verified_at' => 'datetime', 
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
