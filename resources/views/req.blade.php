@extends('layouts.app')

@section('content')
  <div class="container">
    <div id="req">
      <h1 class="head">you can send movie or tv request and we will do our best to bring it to you</h1>
      <form action="{{action('InboxController@store')}}" method="post">
        @csrf
        <input type="text" name="name" class="form-control" placeholder="movie name">
        <textarea name="body" rows="8" cols="80" class="form-control" placeholder="extra information about the movie"></textarea>
        <button type="submit" name="button" class="btn btn-primary">send movie request</button>
      </form>
    </div>
  </div>
@endsection
