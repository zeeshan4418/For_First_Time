@extends('layouts.admin')

@section('content')
  <div class="col-lg-12">
    <div class="card">
      <a href="{{url('admin/video/create')}}" class="btn btn-primary">add new movie</a>
      <p style="margin: 30px 0;">here is the whole list <strong>all comes form what is existing right now </strong></p>
      {{-- start featching data from movies  --}}
      @foreach ($video as $vid)
        @php
          $id = $vid->id;
        @endphp
        {{-- start the movie --}}
        <div class="movie">
          {{-- start with image --}}
          <div class="img">
            <img src="/img/{{$vid->img}}" alt="movie name">
          </div>
          {{-- end with image --}}
          {{-- start with teh movie information --}}
          <div class="text">
            <h1>{{$vid->title}}</h1>
          </div>
          {{-- end up with the movie infoematio --}}
          {{-- start with the post control --}}
          <div class="control">
            <form action="{{action('VideoController@edit' , $id)}}" method="get">
              @csrf
              <input type="hidden" name="_method" value="EDIT">
              <button type="submit" class="btn btn-info" name="delete">edit</button>
            </form>
            <form action="{{action('VideoController@destroy' , $id)}}" method="post">
              @csrf
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-info" name="delete">delete</button>
            </form>
          </div>
          {{-- end the post control --}}
        </div>
        {{-- end the movie  --}}
      @endforeach
      {{-- end the featching data form movies --}}
    </div>
    {!! $video->render() !!}
  </div>
@endsection
