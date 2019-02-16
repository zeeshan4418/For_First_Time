@if (session('err'))
  <div class="col-lg-12">
    <ul style="margin:0; padding:0;">
      <li>
        <div class="alert alert-success" role="alert">
          {{ session('err') }}
        </div>
      </li>
    </ul>
  </div>
  @endif
