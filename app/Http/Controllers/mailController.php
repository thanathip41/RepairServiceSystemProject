<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data;
use App\User;
use Mail;

class mailController extends Controller
{
    function index(){
        $mail=User::all();
        return view('mail.formmail', compact('mail'));
    }

    function post(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',

        ]);
        $data=[
            'email'=>$request->email,
            'subject'=>$request->subject,
            'bodyMessage'=>$request->message,
        ];
         Mail::send('mail.mail',$data,function($message) use($data) {
         $message->from('thanathip.luis@gmail.com','maintenace');
         $message->to($data['email']);
         $message->subject($data['subject']);

     });
     return redirect('/user')->with('success', 'Send E-mail Success');
    }
}
