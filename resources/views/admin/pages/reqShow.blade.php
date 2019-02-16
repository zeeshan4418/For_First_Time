@extends('layouts.admin')
@section('content')
  <div class="col-lg-12">
    <div class="card">
      <h1>{{$email->name}}</h1>
      <p>{{$email->body}}</p>
    </div>
  </div>
@endsection
