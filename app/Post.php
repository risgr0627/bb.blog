<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    
    protected $fillable=[
        'title',
        'team',
        'body',
        'image',
        'category_id',
        'user_id',
    ];
    
    
    protected static function boot(){
        parent::boot();
        
        self::saving(function($post){
           $post->user_id = \Auth::id(); 
        });
    }
    
    // public function getByLimit(int $limit_count = 10){
    //     return $this->orderBy('updated_at','DESC')->limit($limit_count)->get();
    // }
    
    public function getPaginateByLimit(int $limit_count = 10){
        return $this::with('user')->orderBy('updated_at','DESC')->paginate($limit_count);
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
}
