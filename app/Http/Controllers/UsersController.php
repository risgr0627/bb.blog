<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Profile;
use App\Position;

class UsersController extends Controller
{
    
    public function show(User $user)
    {
        $user = User::find($user->id); 
        $posts = Post::where('user_id', $user->id) 
            ->orderBy('created_at', 'desc') 
            ->paginate(15); 
        $profile = Profile::where('user_id', $user->id)->first();
        
        $position = Position::find($user->position_id);
        
        return view('users.show', [
            'user_name' => $user->name,
            'posts' => $posts, 
            'position' => $position,
            'profile' => $profile,
        ]);
    }
    
    public function serchpage(){
        return view('serchpage');
    }
    
    public function serch(Request $request){
        $keyword_name = $request->name;
        $keyword_team = $request->team;
        $keyword_position = $request->position_id;
        
        if(!empty($keyword_name) && empty($keyword_team) && empty($keyword_position)) {
            //   $query = User::query();
              $users = User::where('name','like', '%' .$keyword_name. '%')->get();
              
            $message = "「". $keyword_name."」を含む選手の検索が完了しました。";
              
              return view('/serchpage')->with([
                'users' => $users,
                'message' => $message,
              ]);
            // dd($users);
            // 
        }elseif(empty($keyword_name) && !empty($keyword_team) && empty($keyword_position)){
            $query = User::query();
            $profiles = Profile::where('team','like', '%' .$keyword_team. '%')->get();
            $message = "「". $keyword_team."」を含む選手の検索が完了しました。";
            return view('/serchpage')->with([
                'profiles' => $profiles,
                'message' => $message,
            ]);
            // dd($profiles);
        }elseif(empty($keyword_name) && empty($keyword_team) && !empty($keyword_position)){
            $query = User::query();
            $users = $query->where('position_id','like', '%' .$keyword_position. '%')->get();
            $message = "「". Position::find($keyword_position)->name."」を含む選手の検索が完了しました。";
            return view('/serchpage')->with([
                'users' => $users,
                'message' => $message,
            ]);
            
        }elseif(!empty($keyword_name) && !empty($keyword_team) && empty($keyword_position)){
            $query = User::query();
            $profiles = Profile::where('team','like', '%' .$keyword_team. '%')->get();
            $users = $query->where('name','like', '%' .$keyword_name. '%')->pluck('id');
            $profile = [];
            
            if($profiles && $users){
                foreach($users as $user){
                    $profile[] = Profile::where('user_id' , $user)->where('team','like', '%' .$keyword_team. '%')->first();
                }
            }
            $message = "「".$keyword_name . "」と「".$keyword_team . "」を含む選手の検索が完了しました";
            return view('/serchpage')->with([
                'profiles' => $profile,
                'message' => $message,
            ]);
            // dd($profile);
        
        }elseif(!empty($keyword_name) && empty($keyword_team) && !empty($keyword_position)){
            $query = User::query();
            $users = $query->where('name','like', '%' .$keyword_name. '%')->where('position_id' , $keyword_position)->get();
            $position = Position::find($keyword_position);
            
            $message = "「".$keyword_name . "」と「".$position->name. "」 を含む選手の検索が完了しました";
            
            return view('/serchpage')->with([
                'users' => $users,
                'message' => $message
            ]);
            // dd($position->name);
            
        }elseif(empty($keyword_name) && !empty($keyword_team) && !empty($keyword_position)){
            $query = User::query();
            $profiles = Profile::where('team','like', '%' .$keyword_team. '%')->get();
            $users = $query->where('position_id', $keyword_position)->get();
            $position = Position::find($keyword_position);
            $profile =[];
            
            if($profiles && $users){
                foreach($users as $user){
                    $profile[] = Profile::where('user_id' , $user->id)->where('team','like', '%' .$keyword_team. '%')->first();
                }
            }
               
            
            $message = "「".$keyword_team. "」と「".$position->name. "」 を含む選手の検索が完了しました";
            return view('/serchpage')->with([
                'profiles' => $profile,
                'message' => $message,
            ]);
            // dd($users);
        
        }elseif(!empty($keyword_name) && !empty($keyword_team) && !empty($keyword_position)){
            $query = User::query();
            $users = $query->where('name','like', '%' .$keyword_name. '%')->where('position_id', $keyword_position)->get();
            $profiles = Profile::where('team','like', '%' .$keyword_team. '%')->get();
            $position = Position::find($keyword_position);
            $profile = [];
            
            if($profiles && $users){
                foreach($users as $user){
                    $profile[] = Profile::where('user_id' , $user->id)->where('team','like', '%' .$keyword_team. '%')->first();
                }
            }
            
            $message = "「".$keyword_name. "」と「".$keyword_team. "」と「".$position->name. "」 を含む選手の検索が完了しました";
            return view('/serchpage')->with([
                'profiles' => $profile,
                'message' => $message,
            ]);
            
        }elseif(empty($keyword_name) && empty($keyword_team) && empty($keyword_position)){
            $message = "＊条件が指定されていません";
            return view('/serchpage')->with(['message' => $message]);
        }
    }


}
