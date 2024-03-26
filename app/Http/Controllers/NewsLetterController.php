<?php

namespace App\Http\Controllers;

use App\Models\NewsLetter;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
  public function subscribe(Request $request)
  {
    $return_url = $request->prev_url . '#newsletter';

    if ( count(NewsLetter::where('email', $request->news_email)->get()) != 0) 
    {
      return redirect($return_url)->with('news_email_exist', 'Email <b>already</b> subscribed!');
    }

    $request->validate(['news_email' => 'required|email|min:6',]);

    $subscription = new NewsLetter;
    $subscription->subscriber_id = random_int(99, 100000);    

    $subscription->email = $request->news_email;
    
    $subscription->save();

    return redirect($return_url)->with('news_subscription_success', 'Subsciption registered <b style="color:inherit;">succesfully!');
  }
}
