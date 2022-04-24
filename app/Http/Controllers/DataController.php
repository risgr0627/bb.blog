<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class DataController extends Controller
{
    public function index(Data $data){
            $user = Auth::user();
            $data = Data::where('user_id',$user->id)->first();
            $post = Post::where([
                    ['user_id','=', $user->id],
                    ['category_id','=',1]
                ])->get();
                
            $at_bat=0;
            $homerun=0;
            $hit=0;
            $four_dead_ball=0;
            $bunt=0;
            $number_of_pitches=0;
            $conceded=0;
            $strikeout=0;
            $hi_hit=0;
            $yo_four_dead_balls=0;
            
            foreach($post as $value){
                $at_bat += $value['at_bat'];
                $homerun += $value['homerun'];
                $hit += $value['hit'];
                $four_dead_ball += $value['four_dead_balls'];
                $bunt += $value['bunt'];
                $number_of_pitches += $value['number_of_pitches'];
                $conceded += $value['conceded'];
                $strikeout += $value['strikeout'];
                $hi_hit += $value['hi_hit'];
                $yo_four_dead_balls += $value['yo_four_dead_balls'];
            }
            
            $bat = $at_bat - $four_dead_ball - $bunt;
                
            
        if($at_bat === 0 && $number_of_pitches === 0){
                    
                    $msg = '＊まだ試合データがありません';
                    return view('/users/data',['msg' => $msg]);
        
            }elseif(isset($data)){
                
                    $batting_average = round(($hit / $bat),3);
                    $on_base_percentage = round((($hit + $four_dead_ball) / ($bat + $four_dead_ball + $bunt)),3);
                    // $earned_run_average = round((($conceded * 9 * 3) / ($number_of_pitches * 3)),3);
                    $data->update([
                        'batting_average' => $batting_average ,   
                        'on_base_percentage' => $on_base_percentage
                    ]);
                }elseif(!isset($data)){
                    
                    $data = new Data();
                    
                    $batting_average = round(($hit / $bat),3);
                    $on_base_percentage = round((($hit + $four_dead_ball) / ($bat + $four_dead_ball + $bunt)),3);
                    $data->batting_average = $batting_average;
                    $data->on_base_percentage = $on_base_percentage;
                    
                    $data->save();
                }
                
                
            
            return view('users/data')->with([
                    'at_bat' => $at_bat,
                    'homerun' => $homerun,
                    'hit' => $hit,
                    'four_dead_ball' => $four_dead_ball,
                    'bunt' => $bunt,
                    'bat' => $bat,
                    'batting_average' => $batting_average,
                    'on_base_percentage' => $on_base_percentage,
                    'number_of_pitches' => $number_of_pitches,
                    'conceded' => $conceded,
                    'strikeout' => $strikeout,
                    'hi_hit' => $hi_hit,
                    'bunt' => $bunt,
                    'yo_four_dead_balls' => $yo_four_dead_balls,
                ]);
        }
        
    
    
    public function show(Request $request){
        $validator = Validator::make($request->all(),[
                    'kind' => 'required',
                ]);
        if($validator->fails()){
                    
                    $msg = '＊選択されていません';
                    return view('/rankpage',['msg' => $msg]);
        }else{
        $kind = Data::orderBy($request->kind,'desc')->get();
        
        return view('rankpage')->with(['kinds' => $kind, 'request' => $request->kind]);
        }
    }
    
    public function rankpage(){
        return view('/rankpage');
    }
    
}
