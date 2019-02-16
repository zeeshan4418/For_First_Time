<footer>
  <div class="container">
    <div class="row">
      <!-- start sucscribe -->
      <div class="col-lg-6">
        <div class="emailList">
          <h1 class="title">Newsletter</h1>
          <p class="paragraph">Subscribe now to get free movies and tv serise from time to time per month .</p>
          <form class="emailForm" action="{{ route('email') }}" method="post">
            @csrf
            <input class="inputDefault" type="text" name="emailInput" placeholder="your email address">
            <button type="submit" class="btn btn-primary">Subscribe</button>
          </form>
        </div>
      </div>
      <!-- end subscribe -->
      <!-- start links -->
      <div class="col-lg-6">
        <div class="links">
          <h1 class="title">Movies Category</h1>
          <ul>
            @php
              use \App\Cat;
              $cats1 = Cat::all()->take(6);
              $cats2 = Cat::take(6)->orderBy('id' , 'desc')->get();
            @endphp
            <li>
              @foreach ($cats1 as $cat)
                <a href="{{url('cat/'.$cat->id)}}">{{$cat->name}}</a>
              @endforeach
            </li>
            <li>
              @foreach ($cats2 as $cat)
                <a href="{{url('cat/'.$cat->id)}}">{{$cat->name}}</a>
              @endforeach
            </li>
          </ul>
        </div>
      </div>
      <!-- end links -->
      <!-- start bottom -->
      <div class="col-lg-12">
        <div class="bottom">
          @php
            use App\Configs;
            $copy = Configs::find(1);
          @endphp

          @if (count($copy))
            <a href="{{url('/')}}">{{$copy->copyright}}</a>
          @endif
        </div>
      </div>
      <!-- end bottom -->
    </div>
  </div>
</footer>
<!-- end footer -->
