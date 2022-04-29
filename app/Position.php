<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions';
    
    protected $fillable = [
        'name'    
    ];
    
    public function user(){
        return $this->hasMany('App\User');
    }
    
    protected static function boot(){
        parent::boot();
        
        self::saving(function($post){
           $post->user_id = \Auth::id(); 
        });
    }
}
