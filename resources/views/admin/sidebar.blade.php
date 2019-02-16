@php
  use App\Configs;
  $con = Configs::find(1);
@endphp
<div class="sidebar">
  <!-- start with head -->
  <div class="head">
    <div class="logo">
      <img src="/img/{{$con->admin_logo}}" alt="">
    </div>
    <a href="{{url('/admin/video/create')}}" class="btn btn-danger">SUBMIT new MOVIE</a>
  </div>
  <!-- end with head -->
  <!-- start the list -->
  <div id="list">
    <ul class="nav flex-column">
      <li class="nav-item"><a href="{{url('/admin')}}" class="nav-link {{ Request::is('admin') ? 'active' : '' }}"><i class="fa fa-adjust"></i>Dashboard</a></li>
      <li class="nav-item"><a href="{{url('/admin/user')}}" class="nav-link {{ Request::is('admin/user') ? 'active' : '' }}"><i class="fa fa-user"></i>users <span class="badge badge-primary">new</span></a></li>
      <li class="nav-item"><a href="{{url('/admin/cat')}}" class="nav-link {{ Request::is('admin/cat') ? 'active' : '' }}"><i class="fa fa-location-arrow"></i>Categories</a></li>
      <li class="nav-item"><a href="{{url('/admin/pages')}}" class="nav-link {{ Request::is('admin/pages') ? 'active' : '' }}"><i class="fa fa-paperclip"></i>Pages</a></li>
      <li class="nav-item"><a href="{{url('/admin/directors')}}" class="nav-link {{ Request::is('admin/directors') ? 'active' : '' }}"><i class="fa fa-adjust"></i>directors</a></li>
      <li class="nav-item"><a href="{{url('/admin/actors')}}" class="nav-link {{ Request::is('admin/actors') ? 'active' : '' }}"><i class="fa fa-bomb"></i>actors</a></li>
      <li class="nav-item"><a href="{{url('/admin/writers')}}" class="nav-link {{ Request::is('admin/writers') ? 'active' : '' }}"><i class="fa fa-address-book"></i>writers</a></li>
      <li class="nav-item"><a href="{{url('/admin/video')}}" class="nav-link {{ Request::is('admin/video') ? 'active' : '' }}"><i class="fa fa-video"></i>Videos</a></li>
      <li class="nav-item"><a href="{{url('/admin/tv')}}" class="nav-link {{ Request::is('admin/tv') ? 'active' : '' }}"><i class="fa fa-sun"></i>Tv Series</a></li>
      <li class="nav-item"><a href="{{url('/admin/inbox')}}" class="nav-link {{ Request::is('admin/inbox') ? 'active' : '' }}"><i class="fa fa-at"></i>inbox</a></li>
      <li class="nav-item"><a href="{{url('/admin/config')}}" class="nav-link {{ Request::is('admin/confirmation') ? 'active' : '' }}"><i class="fa fa-at"></i>confirmation</a></li>
    </ul>
  </div>
  <!-- end the list -->
</div>
