@extends('layouts.app')

@section('content')
<!-- start movies list -->
<section id="MoviesList">
  <div class="container">
    <div class="row">
      @foreach ($video as $video)
        @php
          $id = $video->id;
          $tv = $video->tv;
        @endphp
        <!-- start post -->
        @if ($tv == 0)
          <div class="col-lg-2 col-md-3 col-sm-4 col-12">
            <div class="post">
              <a href="{{action('SuperController@show' , $id)}}" class="all">
                <div class="over">
                  <a href="{{action('SuperController@show' , $id)}}">
                    <span class="fa fa-play"></span>
                  </a>
                </div>
              </a>
              <img src="/img/{{$video->img}}" alt="">

              @if ($video->pro == 0)
                <div class="type free">free</div>
              @else
                <div class="type pro">pro</div>
              @endif

              @if ($video->tv > 0)
                <div class="type eps">22</div>
              @endif
              <div class="type hd">{{$video->quality}}</div>
              <div class="text">
                <p>{{$video->title}}</p>
              </div>
            </div>
          </div>
        @endif
        <!-- end post -->
      @endforeach
    </div>
  </div>
</section>
<!-- end movies list -->


@endsection
