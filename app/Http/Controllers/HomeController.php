<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Tv;
use App\User;
use App\Cat;
use App\Inbox;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/');
    }

    public function profile()
    {
        return view('profile');
    }

    public function admin()
    {
        $data = data();
        $video = Video::all();
        $tv = Tv::all();
        $inbox = Inbox::all();
        $cat = Cat::all();
        $user = User::all();

        return view('admin.pages.index')
        ->with('video',$video)
        ->with('tv',$tv)
        ->with('inbox',$inbox)
        ->with('cat',$cat)
        ->with('user',$user)
        ->with('data' , $data);
    }
}
