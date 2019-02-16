<div class="head">
  <!-- head top -->
  <div class="top">
    <div class="left">
      <button id="on" class="btn btn-info"><i class="fa fa-bars"></i></button>
      <button id="off" class="btn btn-info hide"><i class="fa fa-align-left"></i></button>
      {{-- <button class="btn btn-info"><i class="fa fa-expand-arrows-alt"></i></button> --}}
      <a href="{{url('/')}}" class="btn btn-info"><i class="fa fa-home"></i>Back Home</a>
      {{-- <button class="btn btn-info"></button> --}}
    </div>
    <div class="right">
      {{-- <button class="btn btn-info"><i class="fa fa-bell"></i></button> --}}
      <a href="{{url('admin/inbox')}}" class="btn btn-info"><i class="fa fa-envelope"></i></a>
      {{--<button class="btn btn-info dropdown-toggle" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">mohamed</button>--}}
      @if(Auth::check())
        <a href="{{ route('logout')}}" class="btn btn-info">Logout</a>
      @else
        <a href="{{ route('login') }}" class="btn btn-default">Login</a>
        <a href="{{ route('register') }}" class="btn btn-default">Register</a>
      @endif
    </div>
  </div>
  <!-- end head top -->
  <!-- start head bottom -->
  <div class="bottom">
    <div class="left">
      <h1>dashboard</h1>
    </div>
    <div class="right">
      @php
        use Illuminate\Support\Facades\Route;
      @endphp
      <h1>{{Route::getFacadeRoot()->current()->uri()}}</h1>
    </div>
  </div>
  <!-- end head bottom -->
</div>
