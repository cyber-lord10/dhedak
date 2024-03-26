<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GitHubController extends Controller
{
    public function gitHubPage()
    {
      return Socialite::driver('github')->redirect();
    }

    public function gitHubCallBack()
    {
      
        $gitHubUser = Socialite::driver('github')->user();
   
        $finduser = User::where('github_id', $gitHubUser->id)->first();
   
        if($finduser)
        {
            $finduser->name = $gitHubUser->nickname;
            $finduser->email = $gitHubUser->email;
            $finduser->github_id = $gitHubUser->id;
            $finduser->github_token = $gitHubUser->token;
            $finduser->save();

            Auth::login($finduser);
  
            return redirect()->intended(route('home-redirect'));   
        }

        else

        { 

          $users = User::where('email', $gitHubUser->email);

          if ($users->count()) {
            $newUser = $users->first();
            $newUser->name = $gitHubUser->nickname;
            $newUser->github_id = $gitHubUser->id;
            $newUser->github_token = $gitHubUser->token; 
            $newUser->save();
          } 

          else 

          {
            $newUser = User::create([
                'name' => $gitHubUser->nickname,
                'email' => $gitHubUser->email, 
                'github_id'=> $gitHubUser->id,
                'github_token' => $gitHubUser->token, 
            ]);
          }
        }

            Auth::login($newUser);
  
            return redirect()->intended(route('home-redirect'));
    
    }

}
