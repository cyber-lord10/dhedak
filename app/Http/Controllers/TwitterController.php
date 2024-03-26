<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class TwitterController extends Controller
{
    public function twitterPage()
    {
      return Socialite::driver('twitter')->redirect();
    }

    public function twitterCallBack()
    {
      
        $twitterUser = Socialite::driver('twitter')->user();

        dd($twitterUser);
   
        $finduser = User::where('twitter_id', $twitterUser->id)->first();
   
        if($finduser)
        {
            $finduser->name = $twitterUser->name;
            $finduser->email = $twitterUser->email;
            $finduser->twitter_id = $twitterUser->id;
            $finduser->twitter_token = $twitterUser->token;
            $finduser->save();

            Auth::login($finduser);
  
            return redirect()->intended(route('home-redirect'));   
        }

        else

        { 

          $users = User::where('email', $twitterUser->email);

          if ($users->count()) {
            $newUser = $users->first();
            $newUser->name = $twitterUser->name;
            $newUser->twitter_id = $twitterUser->id;
            $newUser->twitter_token = $twitterUser->token;
            $newUser->save();
          } 

          else 

          {
            $newUser = User::create([
                'name' => $twitterUser->name,
                'email' => $twitterUser->email, 
                'twitter_id'=> $twitterUser->id,
                'twitter_token' => $twitterUser->token,
            ]);
          }
        }

            Auth::login($newUser);
  
            return redirect()->intended(route('home-redirect'));
    
    }

}
