<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Video;
use \App\Actor;
use \App\Writers;
use \App\Director;
use \App\Tv;
use \app\Config;

class SuperController extends Controller
{

  // go back back to home page
    public function home()
    {

      $video = Video::where('tv' , 0)
               ->orderBy('id', 'desc')
               ->take(12)
               ->get();

      $tvs = Tv::orderBy('id' , 'desc')->take(12)->get();
          return view('index')
          ->with('video' , $video)
          ->with('tvs' , $tvs);


    }
  // home page

  // show the single post
  public function show($id)
  {

    //$data = data();
    $video = Video::find($id);

    // get actors
    $actors = $video->stars;
    $arrayActor = explode(',' , $actors);
    $actor = Actor::find($arrayActor);
    // get directors
    $directors = $video->director;
    $arrayDirector = explode(',' , $directors);
    $director = Director::find($arrayDirector);
    // get writers
    $writers = $video->writers;
    $arrayWriter = explode(',' , $writers);
    $writer = Writers::find($arrayWriter);

      return view('singleVideo')
          ->with('video' , $video)
          ->with('director' , $director)
          ->with('writer' , $writer)
          ->with('actor' , $actor);

    /*if (!empty($data)) {
      if ($data[0]->purchase_count > 0) {

      }
    }else {
      return redirect('errr');
    }*/
  }
  // end show the single post

  // start with search
  public function search(Request $req)
  {

    $id = $req->id;

    $video = Video::where('title' , 'LIKE' , '%'. $id . '%')->get();

    return view('search')->with('video' , $video);

    // return $id;
  }
  // end wth search

  // start with tv index
  public function tvIndex()
  {
    $tvs = Tv::orderBy('created_at' , 'desc')->get();

    return view('tvIndex')->with('tvs' , $tvs);
  }
  // end up with tv index

  // start with tv displaying
  public function tvShow($id)
  {
    $tv = Tv::find($id);
    return view('tv')->with('tv' , $tv);
  }
  // end tv displaying

  // from A to Z
    public function az()
    {
      $video = Video::where('tv' , 0)
               ->orderBy('title', 'asc')
               ->get();

      return view('az')->with('video' , $video);
    }
  // end from A to Z

  // start TOP IMDB
    public function top()
    {
      $video = Video::where('tv' , 0)
               ->orderBy('imdb', 'asc')
               ->get();

      return view('top')->with('video' , $video);
    }
  // end TOP IMBD

  // start news
    public function news()
    {
      return view('news');
    }
  // end news

  // start request
    public function req()
    {
      return view('req');
    }
  // end request

  // start with error
  public function err()
  {
    return view('err');
  }
  public function errr()
  {
    return view('errr');
  }
  // end with errror

    public function software(){

        $video = Video::where('tv' , 0)
            ->orderBy('imdb', 'asc')
            ->get();

        return view('software')->with('video' , $video);
    }

    public function showSoftwares($id){

        //$data = data();
        $video = Video::find($id);

        // get actors
        $actors = $video->stars;
        $arrayActor = explode(',' , $actors);
        $actor = Actor::find($arrayActor);
        // get directors
        $directors = $video->director;
        $arrayDirector = explode(',' , $directors);
        $director = Director::find($arrayDirector);
        // get writers
        $writers = $video->writers;
        $arrayWriter = explode(',' , $writers);
        $writer = Writers::find($arrayWriter);

        return view('singleSoftware')
            ->with('video' , $video)
            ->with('director' , $director)
            ->with('writer' , $writer)
            ->with('actor' , $actor);

        //return view('software')->with('video' , $video);
    }
    public function game(){

        $video = Video::where('tv' , 0)
            ->orderBy('imdb', 'asc')
            ->get();

        return view('top')->with('video' , $video);
    }

}
