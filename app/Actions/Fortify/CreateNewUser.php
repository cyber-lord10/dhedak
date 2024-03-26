<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
      
        // Clearing any OAuth users of the email before resignup
        
        DB::delete('DELETE FROM users WHERE email = ? AND password IS NULL LIMIT 1', [$input['email']]);
  
        // if ( DB::select('SELECT * FROM users WHERE user_id = ? AND email = ? LIMIT 1', [1111, $input['email']]) ) 
        // {
        //   $user_id = random_int(99, 100000);
        //   $pswd = Hash::make($input['password']);
        //   DB::update(' 
        //             UPDATE users SET 
        //             user_id = ?,
        //             name = ?, 
        //             phone = ?,
        //             address = ?,
        //             password = ?
        //             ', [$user_id, $input['name'], $input['phone'], $input['address'], $input['password']]);
        // } 
        
        // else
        
        // {
          Validator::make($input, [
              'name' => ['required', 'string', 'max:255'],
              'email' => ['required', 'string', 'email', 'max:255'], // , 'unique:users' 
              'phone' => 'required',
              'address' => 'required',
              'password' => $this->passwordRules(),
              // 'profile_photo_path' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
              'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
          ])->validate();

          $user_id = random_int(99, 100000); 

          return User::create([
              'name' => $input['name'],
              'user_id' => $user_id,
              'email' => $input['email'],
              'phone' => $input['phone'],
              'address' => $input['address'],
              'password' => Hash::make($input['password']),
              // 'profile_photo_path' => $input['profile_photo'],
          ]);
        // }
    }
}
