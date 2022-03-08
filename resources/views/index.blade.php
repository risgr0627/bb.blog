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
    
          <div class="album py-5 bg-light">
            <div class="container">
              <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($posts as $post)
                <div class="col">
                  <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    <div class="card-body">
                        <a  href="/posts/user/{{ $post->id }}"><p class="card-text">{{ $post->name}}</p></a>
                        <a  href="/posts/show/{{ $post->id }}"><p class="card-text">{{ $post->title  }}</p></a>
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
