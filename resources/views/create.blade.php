    @extends('layouts.app')　　　　　　　　　　　　　　　　　　
    @section('content')
        <div class="container">
            <div class="">
                @if(isset(  $msg    ))
                    <p style="color: red">{{$msg}}</p>
                @endif
                    <form action="/posts" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <lavel>タイトル</lavel>
                        <input type="text" class="form-control col-md-5" name="title" placeholder="タイトルを入力">
                        </div>
                        
                        <div class="form-group">
                            <lavel>コメント</lavel>
                        <textarea name="body" class="form-control col-md-5" placeholder="今日の野球"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <lavel>画像</lavel>
                            <input type="file" class="form-control col-md-5" name="image">
                        </div>
                        
                        <div class="form-group">
                            <lavel>カテゴリー</lavel>
                            <!--<select class="form-control col-md-5"  name="category_id"   >-->
                            <!--    <option value="" >選択してください</option>-->
                            <!--    <option value="1"><p data-toggle="collapse" href="#collapseExample">試合</P></option>-->
                            <!--    <option value="2">練習</option>-->
                            <!--</select>-->
                            <div class="form-control col-md-5" >
                                <input type="checkbox"　name="category_id" value="1" data-toggle="collapse" href="#collapseExample">試合
                                <input type="checkbox" name="category_id" value="2">練習
                            </div>
                            
                        </div>
                        <div class="form-group collapse" id="collapseExample">
                            <input type="checkbox"　data-toggle="collapse" href="#dageki">打撃成績
                            <input type="checkbox"　data-toggle="collapse" href="#tousyu">投手成績
                            <input type="checkbox"　data-toggle="collapse" href="#dageki,#tousyu">両成績
                        </div>
                        <div class="form-group collapse" id="dageki">
                            <p>＊打撃成績を入力してください（0の場合0と入力）</p>
                            <lavel>打席</lavel><input type="number" class="form-control col-md-5" name="at_bat" placeholder="打席">
                            <lavel>安打</lavel><input type="number" class="form-control col-md-5" name="hit" placeholder="安打">
                            <lavel>ホームラン</lavel><input type="number" class="form-control col-md-5" name="homerun" placeholder="ホームラン">
                            <lavel>四死球</lavel><input type="number" class="form-control col-md-5" name="four_dead_balls" placeholder="四死球">
                            <lavel>犠打</lavel><input type="number" class="form-control col-md-5" name="bunt" placeholder="犠打">
                        </div>
                        <div class="form-group collapse" id="tousyu">
                            <p>＊投手成績を入力してください（0の場合0と入力）</p>
                            <lavel>投球回</lavel><input type="number" class="form-control col-md-5" name="number_of_pitches" placeholder="投球回">
                            <lavel>自責点</lavel><input type="number" class="form-control col-md-5" name="conceded" placeholder="自責点">
                            <lavel>奪三振</lavel><input type="number" class="form-control col-md-5" name="strikeout" placeholder="奪三振">
                            <lavel>被安打</lavel><input type="number" class="form-control col-md-5" name="hi_hit" placeholder="被安打">
                            <lavel>与四死球</lavel><input type="number" class="form-control col-md-5" name="yo_four_dead_balls" placeholder="与四死球">
                        </div>
                        
                        <div class="form-group w-100">
                            <input type="submit" class="btn btn-primary col-md-5" value="投稿">
                        </div>
                    </form>
                </div>
            </div>
        
   @endsection