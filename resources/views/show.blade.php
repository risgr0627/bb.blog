    @extends('layouts.app')　　　　　　　　　　　　　　　　　
    @section('content')
          <div class=" py-5 bg-light">
            <div class="container">
              <div class="">
                <h1 class="border-bottom  border-dark mb-5 pl-3 pb-3">{{ $post->title }}</h1>
                  <div class="ml-5">
                    @if($post->category_id == 1)
                        <p class="border-bottom w-50 pl-3">成績</p>
                        <div class="form-inline list-unstyled ">
                          <p class="ml-3 mr-3">打撃成績:</p>
                          <li class="ml-3 mr-3">打席  {{$post->at_bat}}</li>
                          <li class="mr-3">安打  {{$post->hit}}</li>
                          <li class="mr-3">ホームラン   {{$post->homerun}}</li>
                          <li class="mr-3">四死球   {{$post->four_dead_balls}}</li>
                          <li>犠打  {{$post->bunt}}</li>
                        </div>
                        <div class="form-inline list-unstyled ">
                          <p class="ml-3 mr-3">投手成績:</p>
                          <li class="ml-3 mr-3">投球回  {{$post->number_of_pitches}}</li>
                          <li class="mr-3">失点  {{$post->conceded}}</li>
                          <li class="mr-3">奪三振   {{$post->strikeout}}</li>
                          <li class="mr-3">被安打   {{$post->hi_hit}}</li>
                          <li>与四死球  {{$post->yo_four_dead_balls}}</li>
                        </div>
                    @endif
                  </div>
                  <div class="py-5">
                    <p>{{ $post->body }}</p>
                  </div>
                  <div class="w-70">
                    
                    @if(preg_match('/\.gif$|\.png$|\.jpg$|\.jpeg$|\.bmp$|\.webp$/i', $post->image))
                      <img src="{{  $post->image  }}" style="max-width:100%">
                    @else
                      <video controls preload="auto"style="height: 60%">
                        <source src="{{$post->image}}" type="video/mp4">
                      </video>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
          
    @endsection
