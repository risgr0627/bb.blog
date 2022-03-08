<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    
    protected $fillable=[
        'title',
        'team',
        'position',
        'weight',
        'height',
        'body',
        'name',
    ];
    
    // public function getByLimit(int $limit_count = 10){
    //     return $this->orderBy('updated_at','DESC')->limit($limit_count)->get();
    // }
    
    public function getPaginateByLimit(int $limit_count = 10){
        return $this->orderBy('updated_at','DESC')->paginate($limit_count);
    }
}
