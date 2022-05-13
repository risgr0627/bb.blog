<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Profile;
use App\Team;
use App\Position;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $user = Auth::user();
        
        $posts = Post::where('user_id', $user->id) 
            ->orderBy('created_at', 'desc') 
            ->paginate(10);
        $profile = Profile::where('user_id', $user->id)->first();
        
        $position = Position::find($user->position_id);
        
        return view('users/mypage', [
            'user' => $user, 
            'posts' => $posts, 
            'position' => $position,
            'profile' => $profile,
        ]);
        // return dd($profile);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user = Auth::user();
        // $posts = Post::where('user_id', $user->id) ->orderBy('created_at', 'desc') ->paginate(10); 
        // return view('mypage', [
        //     'user_name' => $user->name, 
        //     'posts' => $posts, 
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = Auth::user();
        
        $posts = Post::where('user_id', $user->id) 
            ->orderBy('created_at', 'desc') 
            ->paginate(10);
        $profile = Profile::where('user_id', $user->id)->first();
        
        $position = Position::find($user->position_id);
        
        return view('edit', [
            'user' => $user, 
            'posts' => $posts, 
            'position' => $position,
            'profile' => $profile,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $user = Auth::user();
        $user->position_id = $request->position_id;
        $user->save();
        
        $profile = Profile::where('user_id',$user->id)->first();
        if(isset($profile)){
            // $profile ->update([
            // 'team' => $request->team,
            // 'height' => $request->height,
            // 'weight' => $request->weight,
            // 'achievement' => $request->achievement
            // ]);
            $profile->team = $request->team;
            $profile->height = $request->height;
            $profile->weight = $request->weight;
            $profile->achievement = $request->achievement;
            
            $profile->save();
        }elseif(!isset($profile)){
            $newprofile = new Profile();
                $newprofile->team = $request->team;
                $newprofile->height = $request->height;
                $newprofile->weight = $request->weight;
                $newprofile->achievement = $request->achievement;
                
                $newprofile->save();
        }
        // dd($profile);
        
        
        
        
        
        return redirect()->action('MypageController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
