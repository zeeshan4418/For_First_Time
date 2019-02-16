@extends('layouts.app')
@section('content')
  @include('inc.dir')
  @php
    $vPro = $video->pro;
  @endphp

  @if (Auth::user())
    @php
      $user = Auth::user();
      $pro = $user->pro;
      $admin = $user->admin;
    @endphp

    @if ($vPro == 1)

      @if ($pro === 1 || $admin == 1)
        @include('inc.single')
      @elseif ($pro === 0 || $admin == 0)
        @php
          header('Location: /err');
          exit();
        @endphp
      @endif

    @endif

    @if ($vPro == 0)

      @if ($pro === 1 || $admin == 1 || $pro === 0 || $admin == 0)
        @include('inc.single')
      @endif

    @endif

  @elseif (Auth::guest())
    @if ($vPro === 0)
      @include('inc.single')
    @endif
    @if ($vPro === 1)
      @php
        header('Location: /err');
        exit();
      @endphp
    @endif

  @endif

@endsection
