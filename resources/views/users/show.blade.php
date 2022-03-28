    @extends('layouts.app')　　　　　　　　　　　　　　　　　　
    @section('content')
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
              <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">{{  $user_name  }}</h1>
                チーム:<span>
                          @if(isset( $profile->team ))
                            {{$profile->team}}
                          @else
                            未設定
                          @endif
                        </span><br>
                身長：<span>
                          @if(isset( $profile->height ))
                            {{$profile->height}}
                          @else
                            未設定
                          @endif
                      </span><br>
                体重：<span>
                          @if(isset( $profile->weight ))
                                {{$profile->weight}}
                          @else
                            未設定
                          @endif
                  
                      </span><br>
                ポジション：<span>
                                @if(isset( $position->name ))
                                  {{$position->name}}
                                @else
                                  未設定
                                @endif
                            </span>
              </div>
            </div>
           <div class="album  bg-light">
            <div class="container">
              <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 ">
                @foreach ($posts as $post)
                <div class="col pt-5">
                  <div class="card shadow-sm">
                    <img src="{{  $post->image  }}" >
                    <div class="card-body">
                        <a  href="/posts/show/{{ $post->id }}"><p class="card-text text-left">{{ $post->title  }}</p></a>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                          <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">追加</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">いいね</button>
                          </div>
                          <small class="text-muted">{{ $post->created_at  }}</small>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <div class="paginate pt-5">
                {{  $posts->links()  }}
              </div>
            </div>
          </div>
        </section>

   @endsection
