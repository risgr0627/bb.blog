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
                
            
        if($at_bat === 0 && $number_of_pitches === 0 && $number_of_pitches ===0){
                    
                    $msg = '＊まだ試合データがありません';
                    return view('/users/data',['msg' => $msg]);
        
            }elseif(isset($data)){
                
                    $batting_average = round(($hit / $bat),3);
                    $on_base_percentage = round((($hit + $four_dead_ball) / ($bat + $four_dead_ball + $bunt)),3);
                    $earned_run_average = round((($conceded * 9 * 3) / ($number_of_pitches * 3)),2);
                    $strikeout_average = round((($strikeout * 9) / ($number_of_pitches)),2);
                    $hi_batting_average = 0;
                    $data->update([
                        'batting_average' => $batting_average,
                        'on_base_percentage' => $on_base_percentage,
                        'earned_run_average' => $earned_run_average, 
                        'strikeout_average' => $strikeout_average,
                        'hi_batting_average' => $hi_batting_average
                    ]);
                }elseif(!isset($data)){
                    
                    $data = new Data();
                    
                    $batting_average = round(($hit / $bat),3);
                    $on_base_percentage = round((($hit + $four_dead_ball) / ($bat + $four_dead_ball + $bunt)),3);
                    $earned_run_average = round((($conceded * 9 * 3) / ($number_of_pitches * 3)),2);
                    $strikeout_average = round((($strikeout * 9) / ($number_of_pitches)),2);
                    $hi_batting_average = 0;
                    
                    
                    $data->batting_average = $batting_average;
                    $data->on_base_percentage = $on_base_percentage;
                    $data->earned_run_average = $earned_run_average;
                    $data->strikeout_average = $strikeout_average;
                    $data->hi_batting_average = $hi_batting_average;
                    
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
                    'yo_four_dead_balls' => $yo_four_dead_balls,
                    'earned_run_average' => $earned_run_average,
                    'strikeout_average' => $strikeout_average,
                    'hi_batting_average' => $hi_batting_average
                ]);
            // dd($earned_run_average);
        }
        
    
    
    public function show(Request $request){
        $validator = Validator::make($request->all(),[
                    'kind' => 'required',
                ]);
        if($validator->fails()){
                    
                    $msg = '＊選択されていません';
                    return view('/rankpage',['msg' => $msg]);
        }elseif($request->kind === 'batting_average' || $request->kind === 'on_base_percentage'){
            $kind = Data::orderBy($request->kind,'desc')->get();
        
            return view('rankpage')->with(['kinds' => $kind, 'request' => $request->kind]);
        }elseif($request->kind === 'earned_run_average' || $request->kind === 'strikeout_average'){
            $kind = Data::orderBy($request->kind,'asc')->get();
        
            return view('rankpage')->with(['kinds' => $kind, 'request' => $request->kind]);
        }
    }
    
    public function rankpage(){
        return view('/rankpage');
    }
    
}
