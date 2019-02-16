@extends('layouts.admin')
@section('content')
{{-- start adding tv --}}
<div class="col-lg-12">
  <div class="card">
    <form action="{{action('TvController@store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-lg-12" style="margin-bottom: 40px;">
          <input required type="text" name="name" placeholder="the tv title" class="form-control">
        </div>
        <div class="col-lg-3">
          <p>the thumnail image</p>
          <input required type="file" name="file">
        </div>
        <div class="col-lg-3">
          <p>the poster image</p>
          <input required type="file" name="poster">
        </div>
        <div class="col-lg-3">
          <button type="submit" name="ssubmit" class="btn btn-info">add new tv</button>
        </div>
      </div>
    </form>
  </div>
</div>
{{-- end adding tv --}}
{{-- start featching tv --}}
<div class="col-lg-12">
  <div class="card">
    {{-- start tv --}}
    @foreach ($tvs as $tv)
      <div class="tv">
        <div class="img">
          <img src="{{'/img'.'/'.$tv->img }}" alt="">
        </div>
        <div class="text">
          <h1>{{$tv->name}}</h1>
        </div>
        <div class="control">
          <form action="{{action('TvController@destroy' , $tv->id)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" name="button" class="btn btn-info">delete</button>
          </form>
        </div>
      </div>
    @endforeach
    {{-- end tv --}}
  </div>
</div>
{{-- end featching --}}
@endsection
