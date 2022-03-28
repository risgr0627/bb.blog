<?php

namespace App\Http\Controllers;

use App\Post;
use App\Position;
use App\User;
use App\Team;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Post $post){
        return view('index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function show(Post $post){
        return view('show')->with(['post' => $post]);
    }
    
    public function create(){
        return view('create');
    }
    
    public function store(Request $request, Post $post){
        
            $post->title = $request->title;
            $post->body = $request->body;
            $post->at_bat = $request->at_bat;
            $post->hit = $request->hit;
            $post->homerun = $request->homerun;
            $post->four_dead_balls = $request->four_dead_balls;
            $post->bunt = $request->bunt;
            $post->category_id = $request->category_id;
            
            $image = $request->file('image');
             
            $path = Storage::disk('s3')->putFile('/', $image, 'public');
              
            $post->image = Storage::disk('s3')->url($path);
            
        
            $post->save();
            
            
            
            return redirect('/');
    }

   
    
    
}

