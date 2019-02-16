@extends('layouts.admin')
@section('content')
{{-- start seeing actors --}}
<div class="col-lg-6">
  <div class="card">
    <h1 class="head">all actors</h1>
    @foreach ($actors as $actor)
      {{-- start with actor --}}
      <div class="actor">
        <div class="img">
          <img src="{{ '/img' . '/' . $actor->img}}" alt="">
        </div>
        <div class="text">
          <h1>{{$actor->name}}</h1>
        </div>
        <div class="control">
          <form action="{{action('ActorsController@destroy' , $actor->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" name="submit" class="btn btn-info">delete</button>
          </form>
        </div>
      </div>
      {{-- end actor --}}
    @endforeach
  </div>
</div>
{{-- end actors displaying --}}
{{-- start with adding actors --}}
<div class="col-lg-6">
  <div class="card">
    <h1 class="head">add new actor</h1>
    <form action="{{action('ActorsController@store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <input required class="form-control" type="text" name="name" placeholder="actor name">
      <hr>
      <p>the actor image</p>
      <input required type="file" name="img" >
      <button type="submit" name="submit" class="btn btn-info">add new actor</button>
    </form>
  </div>
</div>
{{-- end adding actors --}}
@endsection
