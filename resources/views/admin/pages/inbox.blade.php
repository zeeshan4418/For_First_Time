@extends('layouts.admin')
@section('content')
  <div class="col-lg-12">
    <div class="card">
      @foreach ($email as $email)
        {{-- start emails --}}
        <div class="email">
          <div class="text">
            <a href="{{action('InboxController@show' , $email->id)}}"><h1>{{$email->name}}</h1></a>
          </div>
          <div class="control">
            <form action="{{action('InboxController@destroy' , $email->id)}}" method="post">
              @csrf
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" name="button" class="btn btn-info">delete</button>
            </form>
          </div>
        </div>
        {{-- end emails --}}
      @endforeach
    </div>
  </div>
@endsection
