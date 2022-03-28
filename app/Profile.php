<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    
    protected $fillable=[
        'team',
        'position',
        'height',
        'weight',
        'team',
    ];
    
    // public function getByLimit(int $limit_count = 10){
    //     return $this->orderBy('updated_at','DESC')->limit($limit_count)->get();
    // }
    
    public function getPaginateByLimit(int $limit_count = 10){
        return $this->orderBy('updated_at','DESC')->paginate($limit_count);
    }
    
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
