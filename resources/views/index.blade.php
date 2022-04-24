<!--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">-->
<!--    <head>-->
<!--        <meta charset="utf-8">-->
<!--        <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
<!--        <link rel="stylesheet" href="css/index.css">-->

<!--        <title>BB.blog</title>-->

        <!-- Fonts -->
<!--        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">-->
<!--    </head>-->
    
    @extends('layouts.app')　　
    
    @section('content')
          <div class=" container album py-5 bg-light">
            <div class="">
              <h1>最新の投稿</h1>
              <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 ">
                @foreach ($posts as $post)
                <div class="col pt-5">
                  <div class="card shadow-sm " style="height: 420px">
                    <a  href="{{ route('users.show', $post->user_id)}}"><p class="card-header">{{ $post->user->name}}</p></a>
                    @if(preg_match('/\.gif$|\.png$|\.jpg$|\.jpeg$|\.bmp$|\.webp$/i', $post->image))
                      <img src="{{  $post->image  }}" style="max-height: 70%" class="Card-img-top">
                    @else
                      <video controls preload="auto"style="height: 60%" class="Card-img-top">
                        <source src="{{$post->image}}" type="video/mp4">
                      </video>
                    @endif
                    <div class="card-body" >
                       
                        <a  href="/posts/show/{{ $post->id }}"><p class="card-title">{{ $post->title  }}</p></a>
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
           
    
              
    @endsection
