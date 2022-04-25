@extends('layouts.app')　　　　　　　　　　　　　　　　　　
    @section('content')
            
        <div class="container">
            @if(isset(  $msg    ))
                    <p style="color: red">{{$msg}}</p>
            @endif
            <p>表示するランキングを選択</p>
            <form action="/rankkinds" method="post" enctype="multipart/form-data">
                @csrf
                <select name="kind">
                    <option value="" >選択してください</option>
                    <option value="batting_average" >打率</option>
                    <option value="on_base_percentage" >出塁率</option>
                    <option value="earned_run_average" >防御率</option>
                    <option value="strikeout_average" >奪三振率</option>
                </select>
                <input type="submit" value="表示">
            </form>
            
            @if(isset($kinds))
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">順位</th>
                                <th scope="col">選手名</th>
                                <th scope="col">@if($request == "batting_average") 
                                                    打率 
                                                @elseif($request == "on_base_percentage")
                                                    出塁率
                                                @elseif($request == "earned_run_average")
                                                    防御率
                                                @elseif($request == "strikeout_average")
                                                    奪三振率
                                                @endif</th>
                            </tr>
                        </thead>
                        @foreach($kinds as $kind)
                        <tbody>
                            <tr>
                                <th scope="row"> {{ $loop->iteration }} </th>
                                <td><a href="{{     route('users.show', $kind->user_id)     }}">{{   $kind->user->name    }}</a></td>
                                    @if($request == 'batting_average')
                                        <td>.{{  1000 * $kind->batting_average  }}</td>
                                    @elseif($request == 'on_base_percentage')
                                        <td>.{{  1000 * $kind->on_base_percentage   }}</td>
                                    @elseif($request == 'earned_run_average')
                                        <td>{{ $kind->earned_run_average   }}</td>
                                    @elseif($request == 'strikeout_average')
                                        <td>{{ $kind->strikeout_average   }}</td>
                                    @endif
                            </tr>
                        </tbody>
                        @endforeach
                </table>
                
                
            
            @endif
        </div>
    
 @endsection