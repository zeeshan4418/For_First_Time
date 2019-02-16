<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Tv;

class TvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tvs = Tv::orderBy('id' , 'desc')->get();
        return view('admin.pages.tv')->with('tvs' , $tvs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get image
        $img = $request->file('file');
        $imageName = uniqid() . '.' . $img->getClientOriginalExtension();
        $img->move( public_path('img/') , $imageName );
        // get poster image
        $poster = $request->file('poster');
        $posterName = uniqid() . '.' . $poster->getClientOriginalExtension();
        $poster->move( public_path('img/') , $posterName );
        // start query
        $req = new Tv;
        $req->name = $request->name;
        $req->img = $imageName;
        $req->poster = $posterName;
        $req->save();
        // return
        return redirect('admin/tv');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tv = Tv::find($id);
        $tv->delete();

        return redirect('/admin/tv') ;
    }
}
