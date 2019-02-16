<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // list all users
        $users = User::paginate(8);
        $all = User::all();
        return view('admin.pages.users')
              ->with('users' , $users)
              ->with('all' , $all);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // show user
        $user = User::find($id);
        $userName = $user->name;
        $password = $user->password;
        $email = $user->email;
        $pro = $user->pro;
        $admin = $user->admin;

        return view('admin.pages.usersEdit')
                ->with('id' , $id)
                ->with('userName' , $userName)
                ->with('password' , $password)
                ->with('email' , $email)
                ->with('pro' , $pro)
                ->with('admin' , $admin);
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
    public function update(Request $req, $id)
    {
        // update the user
        $user = User::find($id);
        $user->name = $req->name;
        $user->email = $req->email;
        $user->pro = $req->pro;
        $user->admin = $req->admin;
        $user->save();

        $err = $user->name . ' Information Updated';

        return redirect('/admin/user')->with('err' , $err);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete user
        $user = User::find($id);
        $user->delete();
        $err = $user->name . ' has been deleted';
        return redirect('admin/user')->with('err' , $err);
    }
}
