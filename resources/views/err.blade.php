@extends('layouts.app')
@section('content')

  <!-- start err -->
  <section id="err">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <h1>Nope !</h1>
          <p>not yet you cannot access this type of content you  have to be </p>
          <a href="{{url('/')}}" class="btn btn-info"><i class="fa fa-home"></i>Go Back Home</a>
          @if (Auth::user())
            @if (Auth::user()->pro === 0)
              <a href="{{url('/plans')}}" class="btn btn-success"><i class="fa fa-money-bill-alt"></i>Be Premium</a>
            @endif
          @endif
          <div class="errImg"><img src="img/404.png" alt=""></div>
        </div>
      </div>
    </div>
  </section>
  <!-- end err -->

@endsection
