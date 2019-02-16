<!-- start single movie -->
<section id="big">
  <div class="vid">
    <a id="vlink" href="javascript:void(0)" class="fa fa-play"></a>
    <img id="vimg" src="/img/{{$video->poster}}" alt="">
    <iframe id="videoFrame" src="{{$video->server_1}}"></iframe>
  </div>
</section>
<!-- end single movie -->
<!-- start btns -->
<section id="topInfo">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="info">
          <div class="left">
            <p><i class="fa fa-video"></i>{{$video->title}}</p>
          </div>
          <div class="right">
            <a href="{{$video->download}}" class="btn btn-primary download"><i class="fa fa-arrow-down"></i>download</a>
            {{-- <a href="" class="btn btn-primary favorite"><i class="fa fa-star"></i>favorite</a> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end btns -->
<!-- start Server -->
<section id="server">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="info">
          <h1>{{$video->title}}</h1>
          <div id="videoLinks" class="links">
            <button type="button" name="button" value="{{$video->server_1}}" class="btn">Server one</button>
            <button type="button" name="button" value="{{$video->server_2}}" class="btn">Server two</button>
            <button type="button" name="button" value="{{$video->server_3}}" class="btn">Server three</button>
            <button type="button" name="button" value="{{$video->server_4}}" class="btn">Server four</button>
            <button type="button" name="button" value="{{$video->server_5}}" class="btn">Server five</button>
            <button type="button" name="button" value="{{$video->server_6}}" class="btn">Server six</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end Server -->
<!-- start movie info -->
<section id="movieInfo">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="left">
          <div class="poster">
            <div class="img">
              <img src="/img/{{$video->img}}" alt="">
            </div>
          </div>
          <div class="info">
            <h1 class="big">{{$video->title}}</h1>
            <p class="paragraph">{{$video->body}}</p>
            <div class="director d-flex">
              <h1>Director :</h1>
              @foreach ($director as $director )
                <a href="#">{{$director->director_name}}</a>
              @endforeach
            </div>
            <div class="writers d-flex">
              <h1>Writers :</h1>
              @foreach ($writer as $writer)
                <a href="#">{{$writer->name}}</a>
              @endforeach
            </div>
            <div class="actors">
              @foreach ($actor as $actor)
                <div class="actor">
                  <a href="#" ><img src="/img/{{$actor->img}}" alt="{{$actor->name}}"></a>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="right">
          <div class="stars">
            @for ($i= 0; $i < $video->rate_stars; $i++)
              <i class="fa fa-star true"></i>
            @endfor
            @for ($i=0; $i < 10 - $video->rate_stars ; $i++)
              <i class="fa fa-star false"></i>
            @endfor
          </div>
          <div class="rate">
            @if ($video->rate_stars < 10)
              <h1>10/0{{$video->rate_stars}}</h1>
              @else
                <h1>10/{{$video->rate_stars}}</h1>
            @endif
          </div>
          <div class="info">
            <ul class="list-group">
              <li class="list-group-item"><h1>Duration :</h1><p>{{$video->duration}}</p></li>
              <li class="list-group-item"><h1>Quality :</h1><p>{{$video->quality}}</p></li>
              <li class="list-group-item"><h1>release :</h1><p>{{$video->release}}</p></li>
              <li class="list-group-item"><h1>IMDb :</h1><p>{{$video->imdb}}</p></li>
            </ul>
          </div>
          <div class="trailer"><a href="javascript:void(0)" class="btn btn-info" data-toggle="modal" data-target="#TrailerModal"><i class="fa fa-play"></i>trailer</a></div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end movie info -->
<!-- start trailer modal -->
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="TrailerModal" tabindex="-1" role="dialog" aria-labelledby="trailerModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe src="{{$video->trailer}}" width="100%" height="100%"></iframe>
      </div>
    </div>
  </div>
</div>
<!-- end trailer modal -->
