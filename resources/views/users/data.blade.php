@extends('layouts.app')　　　　　　　　　　　　　　　　　　
    @section('content')
    @if(isset(  $msg    ))
        <p style="color: red">{{   $msg   }}</p>
    @else
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1 class="card-header">総合成績</h1>    
                   <div class="card-body　col-md-6 my-3 ml-3 d-flex">  
                        <div>
                           <div>打席</div>
                           <div>打数</div>
                           <div>安打</div>
                           <div>本塁打</div>
                           <div>四死球</div>
                           <div>犠打</div>
                           <div>打率</div>
                           <div>出塁率</div>
                        </div>
                        <div　class="ml-5">
                           <div>{{  $at_bat }}</div>
                           <div>{{  $bat    }}</div>
                           <div>{{  $hit    }}</div>
                           <div>{{  $homerun    }}</div>
                           <div>{{  $four_dead_ball    }}</div>
                           <div>{{  $bunt   }}</div>
                           <div>.{{1000 * $batting_average}}</div>
                           <div>.{{1000 * $on_base_percentage}}</div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    @endif
@endsection