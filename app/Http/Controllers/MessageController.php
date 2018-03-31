<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
class MessageController extends Controller
{
    public function store(Request $request){
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required',
        'message' => 'required',
      ]);
      $msg = new Contact;
      $msg->name = $request->name;
      $msg->email = $request->email;
      $msg->message = $request->message;
      $msg->save();
      return back()->with('messages', "Thanks For Contacting Us. We'll reply you in short!");
    }
}
