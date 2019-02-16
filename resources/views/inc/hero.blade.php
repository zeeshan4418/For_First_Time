<!-- start slider -->
<section id="hero">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
      @php
        use \App\Cat;
        use \App\Actor;
        use \App\Writers;
        use \App\Director;
        $v = $video->take(3);
      @endphp

      @foreach ($v as $v)
        @php
          // get actors
          $actors = $v->stars;
          $arrayActor = explode(',' , $actors);
          $actor = Actor::find($arrayActor);
          // get directors
          $directors = $v->director;
          $arrayDirector = explode(',' , $directors);
          $director = Director::find($arrayDirector);
          // get writers
          $writers = $v->writers;
          $arrayWriter = explode(',' , $writers);
          $writer = Writers::find($arrayWriter);
        @endphp
        <div class="carousel-item ">
          <div class="container">
            <div id="HeroVideo">
              <div class="container">
                <div class="row">
                  <div class="col-lg-4">
                    <div class="img">
                      <a href="{{action('SuperController@show' , $v->id)}}" class="fa fa-play"></a>
                      <img class="img-fluid" src="/img/{{$v->img}}" alt="">
                    </div>
                  </div>
                  <div class="col-lg-8 content">
                    <h1 class="title">{{$v->title}}</h1>
                    <p class="paragraph">
                      {{$v->body}}
                    </p>
                    <div class="d-flex text">
                      <p>Director:</p>
                      @foreach ($director as $director)
                        <a href="#">{{$director->director_name}}</a>
                      @endforeach
                    </div>
                    <div class="d-flex text">
                      <p>Writers:</p>
                      @foreach ($writer as $writer)
                        <a href="#">{{$writer->name}}</a>
                      @endforeach
                    </div>
                    <div class="line-black"></div>
                    <div class="d-flex actorsAndRate">
                      <!-- start actors -->
                      <div class="actors">
                        @foreach ($actor as $actor )
                          <div class="act">
                            <a href="#">
                              <img src="/img/{{$actor->img}}" alt="">
                            </a>
                          </div>
                        @endforeach
                        <div class="number">
                          <p>stars</p>
                        </div>
                      </div>
                      <!-- end actors -->
                      <div class="line-black"></div>
                      <!-- start rates -->
                      <div class="rate">
                        @if ($v->imdb != 10)
                          <span>0{{$v->imdb}}</span>
                          @else
                            <span>{{$v->imdb}}</span>
                        @endif
                        <div class="number">
                          <p>idmb</p>
                        </div>
                      </div>
                      <!-- end rates -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach

    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</section>
<!-- end slider -->
