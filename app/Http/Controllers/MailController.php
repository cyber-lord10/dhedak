<?php

namespace App\Http\Controllers;

use Exception;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail()
    {

      $contact = request()->validate([
        'name' => 'required|min:3',
        'email' => 'required|email|min:6',
        'subject' => 'required',
        'body' => 'required|min:5',
      ]);

      
      try 
      {
        Mail::to(env('MAIL_USERNAME'))->send(new ContactMail($contact));
        $email_sent = true;
      } catch (Exception $e) 
      {
        $email_sent = false;
        return redirect()->back()->with(['email_sent'=>$email_sent]);
      }

      return redirect()->back()->with(['email_sent'=>$email_sent]);

    }
    
}
