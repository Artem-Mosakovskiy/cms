<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

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

    public function comments(){
        return $this->hasMany('App\Comments', 'user_id', 'id');
    }

    public function posts(){
        return $this->hasMany('App\Posts', 'user_id', 'id');
    }

    public function status(){
        return $this->belongsTo('App\UserStatuses', 'status_id', 'id');
    }

    public static function hasRole($role){
        if(Auth::user()->role == $role){
            return true;
        }
        return false;
    }
}
