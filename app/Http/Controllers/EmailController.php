<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class EmailController extends Controller
{
    function send(Request $req){
      $this->validate($req, [
        'name' => 'required',
        'mail' => 'required|email',
        'message' => 'required'
      ]);

      $data = [
        'name' => $req->name,
        'mail' => $req->mail,
        'message' => $req->message
      ];

      Mail::to('rick.heemskerk@hotmail.com')->send(new SendMail($data));
      return back()->with('succes', 'Thanks for contacting me!');

    }

}
