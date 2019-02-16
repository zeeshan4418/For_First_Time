<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

\Stripe\Stripe::setApiKey("sk_test_N6nJbeU9iR3vH0xagEvs0TY0");

class SubscriptionsController extends Controller
{
  // plans view
  public function plans()
  {
    return view('plans');
  }

  public function charge(Request $req)
  {

    $id = $req->id;
    $price = $req->price;
    $token = $req->stripeToken;

    $charge = \Stripe\Charge::create(array(
      "amount" => 1000,
      "currency" => "usd",
      "description" => "Example charge",
      "source" => $token,
    ));

    if ($charge) {
      $user = User::find($id);
      $user->pro = 1;
      $user->save();
    }

    return redirect('/');
  }
}
