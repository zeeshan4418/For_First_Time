@extends('layouts.admin')
@section('content')
  <div class="col-lg-12">
    <div class="card">
      <form class="video" action="{{action('VideoController@update' , $video->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        {{-- information --}}
        <div class="row">
          <div class="col-lg-12">
            <p class="head">general information</p>
            <input required class="form-control" placeholder="title" type="text" name="title" value="{{$video->title}}">
            <textarea name="body" placeholder="your text body" class="form-control" rows="8" cols="80">{{$video->body}}</textarea>
          </div>
          {{-- rate --}}
          <div class="col-lg-4">
            <select required class="form-control" name="rate" style="width: 100%;">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
          </div>
          {{-- rate --}}
          {{-- duration --}}
          <div class="col-lg-4">
            <input required type="text" name="duration" class="form-control" placeholder="duration" value="{{$video->duration}}">
          </div>
          {{-- duration --}}
          {{-- quality --}}
          <div class="col-lg-4">
            <input required type="text" name="quality" class="form-control" placeholder="quality" value="{{$video->quality}}">
          </div>
          {{-- quality --}}
          {{-- release --}}
          <div class="col-lg-6">
            <input required type="text" name="release" class="form-control" placeholder="release date" value="{{$video->release}}">
          </div>
          {{-- release --}}
          {{-- imdb --}}
          <div class="col-lg-6">
            <input required type="imdb" name="imdb" class="form-control" placeholder="imdb rate" value="{{$video->imdb}}">
          </div>
          {{-- imdb --}}
        </div>
        {{-- end information --}}
        {{-- start with videos --}}
        <div class="row">
          <div class="col-lg-12">
            <hr>
            <p>video information</p>
            <input required type="text" name="trailer" placeholder="trailer" class="form-control" value="{{$video->trailer}}">
            <input required type="text" name="server_1" placeholder="server_1" class="form-control" value="{{$video->server_1}}">
            <input required type="text" name="server_2" placeholder="server_2" class="form-control"value="{{$video->server_2}}">
            <input required type="text" name="server_3" placeholder="server_3" class="form-control" value="{{$video->server_3}}">
            <input required type="text" name="server_4" placeholder="server_4" class="form-control" value="{{$video->server_4}}">
            <input required type="text" name="server_5" placeholder="server_5" class="form-control" value="{{$video->server_5}}">
            <input required type="text" name="server_6" placeholder="server_6" class="form-control" value="{{$video->server_6}}">
            <hr>
            <input required type="text" name="down" placeholder="the download link" class="form-control" value="{{$video->download}}">
            <hr>
            <p>your post image</p>
            <input required type="file" name="img">
            <p>the movie big poster</p>
            <input required type="file" name="poster">
          </div>
        </div>
        {{-- end with videos --}}
        {{-- start with directors --}}
        <div class="row">
          <div class="col-lg-12">
            <hr>
            <p>the director of the movie <strong>support multiple choice</strong></p>
            <select required name="director[]" multiple style="width: 100%;">
              @foreach ($director as $dir)
                <option value="{{$dir->id}}">{{$dir->director_name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        {{-- end with the directors --}}
        {{-- start with the writers --}}
        <div class="row">
          <div class="col-lg-12">
            <hr>
            <p>the writers of the movie <strong>support multiple choice</strong></p>
            <select required name="writers[]" multiple style="width: 100%;">
              @foreach ($writers as $writer)
                <option value="{{$writer->id}}">{{$writer->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        {{-- end the writers --}}
        {{-- start with actors --}}
        <div class="row">
          <div class="col-lg-12">
            <hr>
            <p>the actors of the movie <strong>support multiple choice</strong></p>
            <select required name="stars[]" multiple style="width: 100%;">
              @foreach ($actors as $act)
                <option value="{{$act->id}}">{{$act->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        {{-- end the actors --}}
        {{-- start if its a tv --}}
        <div class="row">
          <div class="col-lg-12">
            <hr>
            <p><strong>if this video related to a tv you have to choice one</strong></p>
            <p><strong>if its just normal movie choice none</strong></p>
            <select required style="width: 100%;" name="tv">
              <option value="0">none</option>
              @foreach ($tvs as $tv)
                <option value="{{$tv->id}}">{{$tv->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        {{-- end if its a tv --}}
        {{-- start with adding categores --}}
        <div class="row">
          <div class="col-lg-12">
            <hr>
            <p><strong>choice your category</strong></p>
            <select required style="width: 100%;" name="categorys[]" multiple required>
              @foreach ($categorys as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        {{-- end with adding categores --}}
        {{-- start video type --}}
        <div class="row">
          <div class="col-lg-12">
            <p>choice if the movie is premume or free</p>
            <select required style="width: 100%;" name="pro">
              <option value="0">free</option>
              <option value="1">premume</option>
            </select>
          </div>
        </div>
        {{-- end video type --}}
        <button type="submit" class="btn btn-primary" name="submit" style="width: 100%; margin-top: 30px;">sumbit</button>
      </form>
    </div>
  </div>
@endsection
