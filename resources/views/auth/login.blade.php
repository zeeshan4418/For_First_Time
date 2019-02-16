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
          <form class="log" action="{{ route('login') }}" method="post">
            @csrf
            <input placeholder="your email" type="email" name="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}">
            @if ($errors->has('email'))
                <span class="allert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <input placeholder="your password" type="password" name="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}">
            @if ($errors->has('password'))
                <span class="allert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            {{-- <input placeholder="confirm password" type="text" name="" value=""> --}}
            <div class="buttom">
              <button class="btn" type="submit" name="button">log in</button>
              <a class="btn btn-link" href="{{ route('password.request') }}">
                  Forgot Your Password?
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
