@extends('layouts.app')
@section('content')
  <!-- start single movie -->
  <section id="big">
    <div class="vid">
      <img id="vimg" src="/img/{{$tv->poster}}" alt="">
    </div>
  </section>
  <!-- end single movie -->
  <!-- start btns -->
  <section id="topInfo">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="info">
            <div class="left">
              <p><i class="fa fa-video"></i>{{$tv->name}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end btns -->
  {{-- fetch tvs --}}
  @php
    $video = App\Video::where('tv' , $tv->id)->get();
  @endphp
  <section id="MoviesList">
    <div class="container">
      <div class="row">
      @foreach ($video as $video)
      @php
        $id = $video->id;
        $tv = $video->tv;
      @endphp
      <!-- start post -->
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
          <div class="type hd">{{$video->quality}}</div>
          <div class="text">
            <p>{{$video->title}}</p>
          </div>
        </div>
      </div>
      <!-- end post -->
      @endforeach
    </div>
  </div>
</section>
  {{-- end fetch tvs --}}
@endsection
