@extends('layouts.app')　　　　　　　　　　　　　　　　　　
    @section('content')
        <div class="container">
            <form action="/update" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <lavel>チーム</lavel>
                <input type="text" class="form-control col-md-5" name="team" value="@if(isset( $profile->team )){{$profile->team}}@endif">
                </div>
                <div class="form-group">
                    <lavel>ポジション</lavel>
                <select class="form-control col-md-5" name="position_id">
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
                    <lavel>身長</lavel>
                    <input type="number" class="form-control col-md-5" name="height" value="@if(isset( $profile->height )){{$profile->height}}@endif">cm
                </div>
                <div class="form-group">
                    <lavel>体重</lavel>
                    <input type="number" class="form-control col-md-5" name="weight" value="@if(isset( $profile->weight )){{$profile->weight}}@endif">kg
                </div>
                <div class="form-group">
                    <lavel>実績</lavel>
                    <textarea type="text" class="form-control col-md-5" name="achievement">@if(isset( $profile->achievement )){{$profile->achievement}}@endif</textarea>
                </div>
                <div class="form-group w-50">
                    <input type="submit" class="btn btn-primary col-md-5 " value="更新" >
                </div>
                
            </form>
        </div>
   @endsection