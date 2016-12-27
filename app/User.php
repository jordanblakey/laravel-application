<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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

    public function getNameAttribute($value){
        return ucwords($value);
    }

    public function getEmailAttribute($value){
        return strtolower($value);
    }

    public function setNameAttribute($value){
        $this->attributes['name'] = ucwords($value);
    }

    public function setEmailAttribute($value){
        $this->attributes['email'] = strtolower($value);
    }
}
