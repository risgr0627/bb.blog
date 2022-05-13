<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
            'name'
        ];
     protected $table = 'categories';
    
    public function user(){
        return $this->hasMany('App\User');
    }
}
