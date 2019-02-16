@extends('layouts.admin')
@section('content')
  {{-- start with director display --}}
  <div class="col-lg-6">
    <div class="card">
      <p>all your directors</p>
      @foreach ($dir as $dir)
        <h3>{{$dir->director_name}}</h3>
      @endforeach
    </div>
  </div>
  {{-- end with director display --}}
  {{-- start with add director --}}
  <div class="col-lg-6">
    <div class="card">
      <p>add diercor modle</p>
      <form action="{{action('DirectorsController@store')}}" method="post">
        @csrf
        <input required type="text" name="name" placeholder="director name" class="form-control">
        <button type="submit" name="submit" class="btn btn-info">add new director</button>
      </form>
    </div>
  </div>
  {{-- end up with add directors --}}
@endsection
