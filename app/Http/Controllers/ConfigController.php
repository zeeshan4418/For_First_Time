<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configs;

class ConfigController extends Controller
{
  public function config()
  {
    $data = data();

    return view('admin.pages.config')->with('data' , $data);

    // return $data;
  }

  public function add(Request $req)
  {
      $username = $req->username;

      $config = Configs::find(1);
      $config->username = $username;
      $config->save();

      return redirect('admin/config');
  }

  public function info(Request $req)
  {

    $logoS = $req->file('logo');
    $logo = uniqid() . '.' . $logoS->getClientOriginalExtension();
    $logoS->move(public_path('/img'.'/') , $logo);

    $faviconS = $req->file('favicon');
    $favicon = uniqid() . '.' . $faviconS->getClientOriginalExtension();
    $faviconS->move(public_path('/img' . '/') , $favicon);

    $admin_logoS = $req->file('admin_logo');
    $admin_logo = uniqid() . '.' . $admin_logoS->getClientOriginalExtension();
    $admin_logoS->move(public_path('/img' . '/') , $admin_logo);

    $sign_logoS = $req->file('sign_logo');
    $sign_logo = uniqid() . '.' . $sign_logoS->getClientOriginalExtension();
    $sign_logoS->move(public_path('/img' . '/') , $sign_logo);

    $config = Configs::find(1);
    $config->logo = $logo;
    $config->favicon = $favicon;
    $config->copyright = $req->copyright;
    $config->sign_logo = $sign_logo;
    $config->admin_logo = $admin_logo;
    $config->save();

    return redirect('admin/config');
  }


}
