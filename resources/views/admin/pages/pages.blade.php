@extends('layouts.admin')
@section('content')
  <div class="col-lg-12">
    <ul class="m-0 p-0">
      <li class="">
        <div class="card adminPages">
          @if (count($pages))
            @foreach ($pages as $page)
              <div class="page">
                <h1>{{$page->name}}</h1>
                <form action="{{action('PagesController@update' , $page->id)}}" method="post">
                  @csrf
                  <input type="hidden" name="_method" value="PUT">
                  <h1>current state is <span class="badge badge-danger">{{$page->type}}</span></h1>
                  <select name="pageType">
                    <option value="show">show</option>
                    <option value="hide">hide</option>
                  </select>
                  <button type="submit" name="submit" class="btn btn-info">update</button>
                </form>
              </div>
            @endforeach
          @endif
        </div>
      </li>
    </ul>
  </div>
@endsection
