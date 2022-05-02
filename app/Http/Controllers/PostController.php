<?php

namespace App\Http\Controllers;

use App\Post;
use App\Position;
use App\User;
use App\Team;
use App\Profile;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class PostController extends Controller
{
    public function index(Post $post){
        $positions = ['ピッチャー','キャッチャー','ファースト','セカンド','サード','ショート','レフト','センター','ライト'];
        
        foreach($positions as $position){
            $newposition = new Position();
            $newposition->name = $position;
            $newposition->save();
        }
        
        // $categories = ['試合','練習'];
        
        // foreach($categories as $category){
        //     $newcategory = new Category;
        //     $newcategory->update([
        //         'name' => $category    
        //     ]);
        // }
        
        return view('index')->with(['posts' => $post->getPaginateByLimit(),]);
    }
    
    public function show(Post $post){
        return view('show')->with(['post' => $post]);
    }
    
    public function create(){
        return view('create');
    }
    
    public function store(Request $request, Post $post){
        
            $validator = Validator::make($request->all(),[
                    'title' => 'required',
                    'body' => 'required',
                    'image' => 'required',
                    'category_id' => 'required'
                ]);
                
                if($validator->fails()){
                    
                    $msg = '＊入力が不十分です';
                    return view('/create',['msg' => $msg]);
                    // return redirect('/errorpage')->withErrors($validator)->withInput();
                    // dd($validator);
                    
                }else{
                    
                    $post->title = $request->title;
                    $post->body = $request->body;
                    $post->at_bat = $request->at_bat;
                    $post->hit = $request->hit;
                    $post->homerun = $request->homerun;
                    $post->four_dead_balls = $request->four_dead_balls;
                    $post->bunt = $request->bunt;
                    $post->category_id = $request->category_id;
                    $post->number_of_pitches = $request->number_of_pitches;
                    $post->conceded = $request->conceded;
                    $post->strikeout = $request->strikeout;
                    $post->hi_hit = $request->hi_hit;
                    $post->yo_four_dead_balls = $request->yo_four_dead_balls;
                    
                    $image = $request->file('image');
                     
                    $path = Storage::disk('s3')->putFile('/', $image, 'public');
                      
                    $post->image = Storage::disk('s3')->url($path);
                    
                
                    $post->save();
                    
                    
                    
                    return redirect('/');
                }
    }

   
    
    
}

