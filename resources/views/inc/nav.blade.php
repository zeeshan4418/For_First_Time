@php
  use App\Pages;
  use App\Cat;
  use App\Configs;
  $con = Configs::find(1);
  $cats = Cat::all();
  $pages = Pages::all();


@endphp
<!-- start with search  -->
<form class="search" action="{{action('SuperController@search')}}" method="get">
  <input placeholder="serch" type="text" name="id">
  <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
  <a href="#" class="out btn"><i class="fa fa-times"></i></a>
</form>
<!-- end search -->
<!-- strat navbar -->
<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
  <!-- start collapse btn -->
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navContent" aria-controls="navContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- end collapse btn -->
  <!-- start container -->
  <div class="container">
    <!-- start brand -->
    <a class="navbar-brand justify-content-start" href="{{ url('/') }}">
      @if (count (array($con)))
        <img src="/img/{{$con->logo}}" alt="logo">
      @endif
    </a>
    <!-- end brand -->
    <!-- start menu -->
    <div class="collapse navbar-collapse justify-content-end" id="navContent">
      <div class="NavContainer d-flex flex-column">
        <!-- top mnue -->
        <div class="top">
          <button id="SearchIcon" type="button" class="btn btn-success"><i class="fa fa-search"></i></button>
          @guest
            <a href="{{ route('register') }}" class="btn btn-primary">Sign Up</a>
            <a href="{{ route('login') }}" class="btn btn-primary">Sign In</a>
          @else
            <a class="btn btn-info" id="dropdownUser" data-toggle="dropdown" href="#">{{ auth::user()->name }} @if(Auth::user()->pro === 1) <span class="badge badge-primary">pro user</span> @endif <i class="fa fa-arrow-down"></i></a>
            <div class="dropdown-menu d-user" aria-labelledby="dropdownUser">
              <div class="submnue">
                {{-- <a href="{{ url('/profile') }}" class="dropdown-item"><i class="fa fa-user"></i>Profile</a> --}}
                @if (Auth::user()->admin === 1)
                  <a href="{{ url('/admin') }}" class="dropdown-item"><i class="fa fa-user-secret"></i>admin</a>
                @endif
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"><i class="fa fa-certificate"></i>log out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
            </div>
          @endguest
        </div>
        <!-- end top mnue -->
        <!-- start bottom mnue -->
        <div class="bottom" style="text-align: right;">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="dropdownmovie" data-toggle="dropdown" href="#">movies</a>
              <div class="dropdown-menu" aria-labelledby="dropdownmovie">
                <div class="submnue">
                  @if (count($cats))
                    @foreach ($cats as $cat)
                      <a href="{{url('cat/'.$cat->id)}}" class="dropdown-item">{{$cat->name}}</a>
                    @endforeach
                  @endif
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('tv')}}">tv-series</a>
            </li>
            @foreach ($pages as $page)
              @if (count(array($page)) && $page->type == 'show')
                <li class="nav-item">
                  <a class="nav-link" href="{{ url($page->route) }}">{{$page->name}}</a>
                </li>
              @endif
            @endforeach
          </ul>
        </div>
        <!-- end bottom mnue -->
      </div>
    </div>
    <!-- end menu -->
  </div>
  <!-- end container -->
</nav>
<!-- end navbar -->
