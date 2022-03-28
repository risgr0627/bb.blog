@extends('layouts.app')　　　　　　　　　　　　　　　　　　
    @section('content')
        <div class="">
            <form action="/update" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <p>チーム</p>
                <input type="text" name="team" value="@if(isset( $profile->team )){{$profile->team}}@else未設定@endif">
                </div>
                <div class="form-group">
                    <p>ポジション</p>
                <select name="position_id">
                        <option value="@if(isset( $position->name ))
                                        {{$position->id}}
                                        @else
                                        @endif" >
                                            @if(isset( $position->name ))
                                              {{$position->name}}
                                                @else
                                                  未設定
                                                @endif</option>
                        <option value="1">ピッチャー</option>
                        <option value="2">キャッチャー</option>
                        <option value="3">ファースト</option>
                        <option value="4">セカンド</option>
                        <option value="5">サード</option>
                        <option value="6">ショート</option>
                        <option value="7">レフト</option>
                        <option value="8">センター</option>
                        <option value="9">ライト</option>
                    </select>
                </div>
                <div class="form-group">
                    <p>身長</p>
                <input type="text" name="height" value="@if(isset( $profile->height )){{$profile->height}}@else未設定@endif">
                </div>
                <div class="form-group">
                    <p>体重</p>
                <input type="text" name="weight" value="@if(isset( $profile->weight )){{$profile->weight}}@else未設定@endif">
                </div>
                <div class="form-group">
                    <input type="submit" value="投稿">
                </div>
            </form>
        </div>
   @endsection