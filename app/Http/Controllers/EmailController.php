<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Email;

class EmailController extends Controller
{
    public function submit(Request $req)
    {
      $emailName = $req->get('emailInput');

      $email = new Email;
      $email->email_name = $emailName;
      $email->save();

      return redirect('/');

    }
}
