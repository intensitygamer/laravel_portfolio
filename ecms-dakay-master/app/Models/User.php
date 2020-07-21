<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Cartalyst\Sentinel\Users\EloquentUser;

class User extends EloquentUser implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Notifiable, Authenticatable, Authorizable, CanResetPassword;

    protected $loginNames = ['username', 'email'];

    protected $fillable = [
        // account
        'username',
        'email',
        'password',

        // details
        'first_name',
        'last_name',
        'address',
        'gender',
        'contact_number',
        'designation',
        'dob',
        'status',

        // other details
        'permissions',
        'last_login',
        'last_login_ip',
        'login_agent',

        // to be use in filling models
        'year',
        'month',
        'day',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = array('full_name');


    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function getFullNameAttribute()
    {
        return $this->attributes['first_name'] .' '. $this->attributes['last_name'];
    }

}
