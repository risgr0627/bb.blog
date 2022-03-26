<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';
    
    public function user(){
        return $this->hasMany('App\User');
    }
}
