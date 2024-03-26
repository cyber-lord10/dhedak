<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
  public function subscribe(Request $request)
  {
    $return_url = $request->prev_url . '#coupon';

    if ( count(Coupon::where('email', $request->coupon_email)->get()) != 0) 
    {
      return redirect($return_url)->with('coupon_email_exist', 'Email <b>already</b> subscribed!');
    }    

    $request->validate(['coupon_email' => 'required|email|min:6',]);
    
    $subscription = new Coupon;
    $subscription->coupon_id = random_int(99, 100000);

    $subscription->email = $request->coupon_email;
    
    $subscription->save();

    return redirect($return_url)->with('coupon_subscription_success', 'Coupon registered <b style="color:inherit;">succesfully!');
  }
}
