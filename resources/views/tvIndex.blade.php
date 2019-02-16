@extends('layouts.app')

@section('content')

  <!-- start movies list -->
  <section id="MoviesList">
    <div class="container">
      <div class="row">
        {{-- fetch tvs --}}
        @foreach ($tvs as $tv)
          <div class="col-lg-2 col-md-3 col-sm-4 col-12">
            <div class="post">
              <a href="{{action('SuperController@tvShow' , $tv->id)}}" class="all">
                <div class="over">
                  <a href="{{action('SuperController@tvShow' , $tv->id)}}">
                    <span class="fa fa-play"></span>
                  </a>
                </div>
              </a>
              <img src="/img/{{$tv->img}}" alt="">
              @php
                $tvId = $tv->id;
                $vidWithTvId = App\Video::where('tv' , $tvId)->get();
              @endphp
              <div class="type hd">{{count($vidWithTvId)}}</div>
              {{-- <div class="type hd">{{$video->quality}}</div> --}}
              <div class="text">
                <p>{{$tv->name}}</p>
              </div>
            </div>
          </div>
        @endforeach
        {{-- end fetch tvs --}}
      </div>
    </div>
  </section>
  <!-- end movies list -->


@endsection
