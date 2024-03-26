<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{

    public function googlePage()
    {
      return Socialite::driver('google')->redirect();
    }

    public function googleCallBack()
    {
      
        $googleUser = Socialite::driver('google')->user();
        
        // dd($googleUser);
   
        $finduser = User::where('google_id', $googleUser->id)->first();
   
        if($finduser)
        {
            $finduser->name = $googleUser->name;
            $finduser->email = $googleUser->email;
            $finduser->google_id = $googleUser->id;
            $finduser->google_token = $googleUser->token;
            $finduser->save();

            Auth::login($finduser);
  
            return redirect()->intended(route('home-redirect'));   
        }

        else

        { 

          $users = User::where('email', $googleUser->email);

          if ($users->count()) {
            $newUser = $users->first();
            $newUser->name = $googleUser->name;
            $newUser->google_id = $googleUser->id;
            $newUser->google_token = $googleUser->token;

            $newUser->save();
          } 

          else 

          {
            $newUser = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email, 
                'google_id'=> $googleUser->id,
                'google_token' => $googleUser->token,
            ]);
          }
        }

            Auth::login($newUser);
  
            return redirect()->intended(route('home-redirect'));
    }
      


}
  
