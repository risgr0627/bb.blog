<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','position_id','team_id'
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
    
    public function posts(){
        return $this->hasMany('App\Post');
    }
    
    public function profile(){
        return $this->belongsTo('App\Profile');
    }
    
    public function data(){
        return $this->belongsTo('App\Data');
    }
    
    public function team(){
        return $this->belongsTo('App\Team');
    }
    
    public function position(){
        return $this->belongsTo('App\Position');
    }
    
    
}

