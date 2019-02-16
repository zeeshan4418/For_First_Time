@extends('layouts.admin')
@section('content')
  <div class="col-lg-12">
    <div class="card">
      <form action="{{action('UserController@update' , $id)}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <h1 class="head">update {{$userName}} information</h1>

        <label for="name">User Name</label>
        <input required style="margin: 0 0 30px 0;" class="form-control" type="text" name="name" value="{{$userName}}">

        <label for="email">Email</label>
        <input required style="margin: 0 0 30px 0;" class="form-control" type="text" name="email" value="{{$email}}">

        <label for="pro">Membership Type</label>
        @if ($pro !== 1)
          <p>user is on <strong>FREE</strong> membership you can change that or leave it as it is</p>
        @else
          <p>user is on <strong>PREMUME</strong> membership you can change that or leave it as it is</p>
        @endif

        <select required style="width: 100%; margin: 0 0 30px 0;" name="pro">
          @if ($pro !== 1)
            <option value="0">free</option>
            <option value="1">premume</option>
          @else
            <option value="1">premume</option>
            <option value="0">free</option>
          @endif
        </select>

        <label for="admin">User Type</label>
        @if ($admin !== 1)
          <p>user is on <strong>NORMAL USER</strong></p>
        @else
          <p>user is on <strong>ADMIN</strong></p>
        @endif

        <select required style="width: 100%; margin: 0 0 30px 0;" name="admin">
          @if ($admin !== 1)
            <option value="0">normal</option>
            <option value="1">admin</option>
          @else
            <option value="1">admin</option>
            <option value="0">normal</option>
          @endif
        </select>

        <button type="submit" name="button" class="btn btn-primary" style="width: 100%;">update</button>
      </form>
    </div>
  </div>
@endsection
