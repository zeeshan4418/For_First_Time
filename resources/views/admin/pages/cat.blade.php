@extends('layouts.admin')

@section('content')
  {{-- creat category --}}
  <div class="col-lg-12">
    <div id="cat">
      <div class="card">
        {{-- start the adding form --}}
        <form class="addCat" action="{{action('CatController@store')}}" method="post">
          @csrf
          <div class="row">

            <div class="col-lg-6">
              <input required class="form-control" type="text" name="catName" placeholder="category name">
            </div>

            <div class="col-lg-6">
              <button type="submit" name="submit" class="btn btn-primary">add new category</button>
            </div>

          </div>
        </form>
        {{-- end the adding form --}}
      </div>
    </div>
  </div>
  {{-- end create category --}}

  {{-- display categorys --}}
  <div class="col-lg-12">
    <div class="card dis-cat">
      <h1 class="head">tv categorys</h1>
      <ul class="m-0 p-0">
        @if (count($cats))
          @foreach ($cats as $cat)
            <li>
              <h1>{{$cat->name}}</h1>
              <form  action="{{ action('CatController@destroy' , $cat->id) }}" method="post">
                  @csrf
                  <input type="hidden" name="_method" value="DELETE">
                  <button class="btn btn-info" type="submit" name="button">delete</button>
              </form>
            </li>
          @endforeach
        @endif
      </ul>
    </div>
  </div>

  {{-- end display categorys --}}
@endsection
