<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Video;
use \App\Director;
use \App\Actor;
use \App\Writers;
use \App\Tv;
use \App\Cat;
use \App\Config;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = Video::orderBy('id' , 'desc')->paginate(6);
        return view('admin.pages.video')->with('video' , $video);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // directors
        $director = Director::all();
        // writers
        $writers = Writers::all();
        // actors
        $actors = Actor::all();
        // tv
        $tvs = Tv::all();
        // get categorys
        $categorys = Cat::all();

            return view('admin.pages.videoAdd')
            ->with('director',$director)
            ->with('actors' , $actors)
            ->with('writers' , $writers)
            ->with('tvs' , $tvs)
            ->with('categorys' , $categorys);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get the image
        $img = $request->file('img');
        $imgName = uniqid() . '.' . $img->getClientOriginalExtension();
        $img->move(public_path('/img'.'/') , $imgName);
        // get poster
        $poster = $request->file('poster');
        $posterName = uniqid() . '.' . $poster->getClientOriginalExtension();
        $poster->move(public_path('/img'.'/') , $posterName);
        // get the array data
        $stars = implode("," , $request->stars);
        $director = implode("," , $request->director);
        $writers = implode("," , $request->writers);
        $categorys = implode("," , $request->categorys);
        // start qurying
        $req = new Video;
        $req->title = $request->title;
        $req->body = $request->body;
        $req->rate_stars = $request->rate;
        $req->duration = $request->duration;
        $req->quality = $request->quality;
        $req->release = $request->release;
        $req->imdb = $request->imdb;
        $req->writers = $writers;
        $req->director = $director;
        $req->stars = $stars;
        $req->categorys = $categorys;
        $req->trailer = $request->trailer;
        $req->server_1 = $request->server_1;
        $req->server_2 = $request->server_2;
        $req->server_3 = $request->server_3;
        $req->server_4 = $request->server_4;
        $req->server_5 = $request->server_5;
        $req->server_6 = $request->server_6;
        $req->img = $imgName;
        $req->poster = $posterName;
        $req->download = $request->down;
        $req->favorite = 0;
        $req->tv = $request->tv;
        $req->pro = $request->pro;
        $req->save();

        return redirect('admin/video');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // video
        $video = Video::find($id);
        // directors
        $director = Director::all();
        // writers
        $writers = Writers::all();
        // actors
        $actors = Actor::all();
        // tv
        $tvs = Tv::all();
        // get categorys
        $categorys = Cat::all();

        return view('admin.pages.singleVideoEdit')
        ->with('video' , $video)
        ->with('director',$director)
        ->with('actors' , $actors)
        ->with('writers' , $writers)
        ->with('tvs' , $tvs)
        ->with('categorys' , $categorys);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // get the image
      $img = $request->file('img');
      $imgName = time() . '.' . $img->getClientOriginalExtension();
      $img->move(public_path('/img'.'/') , $imgName);
      // get poster
      $poster = $request->file('poster');
      $posterName = time() . '.' . $poster->getClientOriginalExtension();
      $poster->move(public_path('/img'.'/') , $posterName);
      // get the array data
      $stars = implode("," , $request->stars);
      $director = implode("," , $request->director);
      $writers = implode("," , $request->writers);
      $categorys = implode("," , $request->categorys);
      // start qurying
      $req = Video::find($id);
      $req->title = $request->title;
      $req->body = $request->body;
      $req->rate_stars = $request->rate;
      $req->duration = $request->duration;
      $req->quality = $request->quality;
      $req->release = $request->release;
      $req->imdb = $request->imdb;
      $req->writers = $writers;
      $req->director = $director;
      $req->stars = $stars;
      $req->categorys = $categorys;
      $req->trailer = $request->trailer;
      $req->server_1 = $request->server_1;
      $req->server_2 = $request->server_2;
      $req->server_3 = $request->server_3;
      $req->server_4 = $request->server_4;
      $req->server_5 = $request->server_5;
      $req->server_6 = $request->server_6;
      $req->img = $imgName;
      $req->poster = $posterName;
      $req->download = $request->down;
      $req->favorite = 0;
      $req->tv = $request->tv;
      $req->pro = $request->pro;
      $req->save();

      return redirect('admin/video');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();
        // then return to the normal
        return redirect('admin/video');
    }
}
