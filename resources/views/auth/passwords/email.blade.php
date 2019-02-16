@include('inc.head')
<section id="log">
  <div class="container-fluid">
    <div class="row">
      <!-- start logo -->
      <div class="col-lg-6 p-0">
        <div class="left">
          <div class="logo">
            <a href="{{ url('/') }}">
              <img src="/img/logoBig.png" alt="">
            </a>
          </div>
        </div>
      </div>
      <!-- end logo -->
      <!-- start inputs -->
      <div class="col-lg-6 p-0">
        <div class="right">
          <form class="log" action="{{ route('password.email') }}" method="post">
            @csrf
            <input placeholder="your email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <div class="buttom">
              <button class="btn" type="submit" name="button">reset your passowrd</button>
            </div>
          </form>
        </div>
      </div>
      <!-- end inputs -->
    </div>
  </div>
</section>
@include('inc.end')
