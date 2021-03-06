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
        'name', 'email', 'password', 'provider_name', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function accounts(){
        return $this->hasMany('App\SocialAccount');
    }


     public function setNameAttribute($value){
        return $this->attributes['name'] = ucfirst($value);
    }

    public function setPasswordAttribute($value){
        return $this->attributes['password'] = bcrypt($value);
    }


     public function getNameAttribute($value){
        return "User: " . $value;
        return strtoupper($value);
    }
}
