<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';
    
    protected $fillable=[
            'batting_average',
            'on_base_percentage',
            'earned_run_average',
            'strikeout_average',
            'hi_batting_average'
        ];
        
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    protected static function boot(){
        parent::boot();
        
        self::saving(function($post){
           $post->user_id = \Auth::id(); 
    });
    }

}
