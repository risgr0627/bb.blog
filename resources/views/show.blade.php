    @extends('layouts.app')　　　　　　　　　　　　　　　　　
    @section('content')
    
          <div class=" py-5 bg-light">
            <div class="container">
              <div class="">
                <h1>{{ $post->title }}</h1>
                <div class="py-5">
                  <p>{{ $post->body }}</p>
                </div>
                <div class="w-50">
                  <img src="{{  $post->image  }}" class="img-fluid ">
                </div>
              </div>
            </div>
          </div>
          
    @endsection
