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
                    <select name="category_id">
                    <option value="1" >試合</option>
                    <option value="2">練習</option>
                </div>
                <input type="submit" value="投稿">
            </form>
        </div>
   @endsection