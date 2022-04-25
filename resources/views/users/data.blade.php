@extends('layouts.app')　　　　　　　　　　　　　　　　　　
    @section('content')
    @if(isset(  $msg    ))
        <p style="color: red">{{   $msg   }}</p>
    @else
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1 class="card-header">総合成績</h1>
                <div class="card-title"><p>打撃成績</p></div>
                   <ul class="list-group　col-md-6 my-3 ml-3 list-group-flush">  
                           <li class="list-group-item">打席 :{{  $at_bat }}</li>
                           <li class="list-group-item">打数 :{{  $bat    }}</li>
                           <li class="list-group-item">安打:{{  $hit    }}</li>
                           <li class="list-group-item">本塁打:{{  $homerun    }}</li>
                           <li class="list-group-item">四死球:{{  $four_dead_ball    }}</li>
                           <li class="list-group-item">犠打:{{  $bunt   }}</li>
                           <li class="list-group-item">打率:{{1000 * $batting_average}}</li>
                           <li class="list-group-item">出塁率:{{1000 * $on_base_percentage}}</li>
                    </ul>
                    <div class="card-title"><p>打撃成績</p></div>
                   <ul class="list-group　col-md-6 my-3 ml-3 list-group-flush">  
                           <li class="list-group-item">投球回 :{{  $number_of_pitches }}</li>
                           <li class="list-group-item">失点 :{{  $conceded    }}</li>
                           <li class="list-group-item">奪三振:{{  $strikeout   }}</li>
                           <li class="list-group-item">被安打:{{  $hi_hit    }}</li>
                           <li class="list-group-item">与四死球:{{  $yo_four_dead_balls    }}</li>
                           <li class="list-group-item">防御率:{{  $earned_run_average   }}</li>
                           <li class="list-group-item">奪三振率:{{ $strikeout_average}}</li>
                           <li class="list-group-item">非打率:{{ $hi_batting_average}}</li>
                    </ul>
            </div>
        </div>
    </div>
    @endif
@endsection