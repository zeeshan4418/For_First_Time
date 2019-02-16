@extends('layouts.admin')
@section('content')
  {{-- start fetching writers --}}
  <div class="col-lg-6">
    <div class="card">
      <h1 class="head">your writers</h1>
      @foreach ($writers as $writer)
        <div class="writers">
          <div class="text">
            <h1>{{$writer->name}}</h1>
          </div>
          <div class="control">
            <form action="{{action('WritersController@destroy' , $writer->id)}}" method="post">
              @csrf
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" name="submit" class="btn btn-info">delete</button>
            </form>
          </div>
        </div>
      @endforeach
    </div>
  </div>
  {{-- end fetching writers --}}
  {{-- start adding writers --}}
  <div class="col-lg-6">
    <div class="card">
      <h1 class="head">add new writer</h1>
      <form action="{{action('WritersController@store')}}" method="post">
          @csrf
          <input required type="text" name="name" placeholder="the writeter neme" class="form-control">
          <button type="submit" name="submit" class="btn btn-info">add new writer</button>
      </form>
    </div>
  </div>
  {{-- end adding writers --}}
@endsection
