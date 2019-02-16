@extends('layouts.admin')
@section('content')
  {{-- start err --}}
  @include('inc.err')
  {{-- end err --}}
  {{-- start with admin info --}}
  <div class="col-lg-6">
    <div class="card">
      <h1 class="head">your user information</h1>
      <p class="head">your user name : {{Auth::user()->name}}</p>
      <p class="head">your user email : {{Auth::user()->email}}</p>
      <form action="{{action('UserController@show' , Auth::user()->id)}}" method="get">
        @csrf
        <button type="submit" name="submit" class="btn btn-primary">edit</button>
      </form>
    </div>
  </div>
  {{-- end with admin info --}}

  {{-- how many users --}}
  <div class="col-lg-6">
    <div class="card">
      <h1 class="head">how many users do you have ?</h1>
      <h1 class="big">{{count($all)}}</h1>
    </div>
  </div>
  {{-- end how many users --}}

  {{-- start list all users --}}
  <div class="col-lg-12">
    <div class="card">
      <h1 class="head">all users</h1>
      @foreach ($users as $user)
        <div class="user d-flex">

          <p style="flex:1; margin:0; padding:6px 0 0 0;" >{{$user->name}}</p>

          <p style="flex:1; margin:0; padding:6px 0 0 0;" >{{$user->email}}</p>

          @if ($user->pro === 0)
            <p style="flex:1; margin:0; padding:6px 0 0 0;" ><button disabled class="btn btn-secondary">free user</button></p>
          @else
            <p style="flex:1; margin:0; padding:6px 0 0 0;" ><button disabled class="btn btn-info">premume user</button></p>
          @endif

          <form action="{{action('UserController@show' , $user->id)}}" method="get" style="margin:0 30px;">
            @csrf
            <button type="submit" name="button" class="btn btn-primary">edit</button>
          </form>

          <form action="{{action('UserController@destroy' , $user->id)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" name="button" class="btn btn-secondary">delete</button>
          </form>

        </div>
        <div style="border-top:1px solid rgba(0,0,0,0.1); width: 100%; height: 0px; margin:10px 0;" class="hr"></div>
      @endforeach
      <div class="paginate" style="margin-top:30px;">
        {!! $users->render() !!}
      </div>
    </div>
  </div>
  {{-- end all users --}}
@endsection
