<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Actor;

class ActorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actors = Actor::all();
            return view('admin.pages.actors')->with('actors' , $actors);

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
        // get the image
        $img = $request->file('img');
        $imgName = time() . '.' . $img->getClientOriginalExtension();
        $img->move( public_path('img/') , $imgName );
        // valedate
        // $this->valedate($request , [
        //   'name' =>'required',
        //   'img' => 'required|image|mims:jpeg,jpg,gif,svg,png|max:2048',
        // ]);
        // start quring
        $req = new Actor;
        $req->name = $request->name;
        $req->img = $imgName;
        $req->save();

        // return to the main path
        return redirect('admin/actors');

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
        $act = Actor::find($id);
        $act->delete();

        return redirect('admin/actors');
    }
}
