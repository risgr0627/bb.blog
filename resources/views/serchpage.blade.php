@extends('layouts.app')　　　　　　　　　　　　　　　　　　
    @section('content')
   <div class="container">
    <p>検索条件を入力してください</p>
              <form action="/serch" method="post">
              @csrf
                  <div class="form-group">
                    <label>名前</label>
                    <input type="text" class="form-control col-md-5" placeholder="検索したい名前を入力してください" name="name">
                  </div>
                  <div class="form-group">
                    <lavel>チーム名</lavel>
                    <input type="text" class="form-control col-md-5" placeholder="検索したいチーム名を入力してください"　name="team">
                  </div>
                  <div class="form-group">
                    <lavel>ポジション名</lavel>
                    <select class="form-control col-md-5" name="position_id">
                                          <option value="">検索したいポジション名を選択してください</option>
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
                  <input type="submit" class="btn btn-primary col-md-5" value="検索">
                </div>
            </form>
            
            <div style="margin-top:50px;">
            
      </div>
            @if(isset($message))
                <div class="alert alert-primary" role="alert" style="margin-top:50px;">{{$message}}</div>
            @endif
            
            @if(isset($users))
                <div style="margin-top:50px;">
                    <h1>ユーザー一覧</h1>
                    <table class="table">
                      <tr>
                        <th>ユーザー名</th>
                      </tr>
                    @foreach($users as $user)
                      <tr>
                        <td><a href="{{ route('users.show', $user->id)}}">{{$user->name}}</a></td>
                      </tr>
                    @endforeach
                    </table>
                </div>
            @elseif(isset($profiles))
                <div style="margin-top:50px;">
                    <h1>ユーザー一覧</h1>
                    <table class="table">
                      <tr>
                        <th>ユーザー名</th>
                      </tr>
                    @foreach($profiles as $profile)
                      <tr>
                        <td><a href="{{ route('users.show', $profile->user->id)}}">{{$profile->user->name}}</a></td>
                      </tr>
                    @endforeach
                    </table>
                </div>
            @endif
        </div>
@endsection