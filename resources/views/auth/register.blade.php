@php
  use App\Configs;
  $con = Configs::find(1);
@endphp
@include('inc.head')
<section id="log">
  <div class="container-fluid">
    <div class="row">
      <!-- start logo -->
      <div class="col-lg-6 p-0">
        <div class="left">
          <div class="logo">
            <a href="{{ url('/') }}">
              <img src="/img/{{$con->sign_logo}}" alt="">
            </a>
          </div>
        </div>
      </div>
      <!-- end logo -->
      <!-- start inputs -->
      <div class="col-lg-6 p-0">
        <div class="right">
          <form class="log" action="{{ route('register') }}" method="post">
            @csrf

            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="your name" name="name" value="{{ old('name') }}" required autofocus>
            @if ($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif

            <input placeholder="your email" type="email" name="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus>
            @if ($errors->has('email'))
                <span class="allert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

            <input placeholder="your password" type="password" name="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" required autofocus>
            @if ($errors->has('password'))
                <span class="allert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <input id="password-confirm" placeholder="password confirmation" type="password" class="form-control" name="password_confirmation" required>
            <div class="buttom">
              <button class="btn" type="submit" name="button">sign up</button>
              <a class="btn btn-link" href="{{ route('login') }}">
                  log in
              </a>
            </div>
          </form>
        </div>
      </div>
      <!-- end inputs -->
    </div>
  </div>
</section>
@include('inc.end')
