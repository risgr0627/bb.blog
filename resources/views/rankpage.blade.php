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
                                    @endif
                            </tr>
                        </tbody>
                        @endforeach
                </table>
                
                
            
            @endif
        </div>
    
 @endsection