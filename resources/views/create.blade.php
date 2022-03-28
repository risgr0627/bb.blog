    @extends('layouts.app')　　　　　　　　　　　　　　　　　　
    @section('content')
        <div class="">
            <form action="/posts" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <p>タイトル</p>
                <input type="text" name="title" placeholder="タイトルを入力">
                </div>
                <div class="form-group">
                    <p>コメント</p>
                <textarea name="body" placeholder="today's baseball"></textarea>
                </div>
                <div class="form-group">
                    <p>画像</p>
                    <input type="file" name="image">
                </div>
                <div class="form-group">
                    <p>カテゴリー</p>
                    <select name="category_id">
                        <option value="" >選択してください</option>
                        <option value="1" >試合</option>
                        <option value="2">練習</option>
                    </select>
                </div>
                <div class="form-group">
                    <p>試合を選択したら入力</p>
                    <input type="number" name="at_bat" placeholder="打席">
                    <input type="number" name="hit" placeholder="安打">
                    <input type="number" name="homerun" placeholder="ホームラン">
                    <input type="number" name="four_dead_balls" placeholder="四死球">
                    <input type="number" name="bunt" placeholder="犠打">
                </div>
                <div class="form-group">
                    <input type="submit" value="投稿">
                </div>
            </form>
        </div>
   @endsection