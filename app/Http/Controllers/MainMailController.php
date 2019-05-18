<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data;
use App\User;
use Mail;

class MainMailController extends Controller
{
    // function index(){
    //     $mail=User::all();
    //     return view('maintenance.index', compact('mail'));
    // }

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
         Mail::send('Maintenance.mail',$data,function($message) use($data) {
         $message->from('thanathip.luis@gmail.com','maintenace');
         $message->to($data['email']);
         $message->subject($data['subject']);

     });
     return redirect('/datarepair')->with('success', 'Send E-mail Successfully');
    }
}
