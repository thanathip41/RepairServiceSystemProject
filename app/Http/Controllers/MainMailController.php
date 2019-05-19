<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data;
use App\User;
use Mail;

class MainMailController extends Controller
{
    function index(){
        return view('maintenance.formmail');
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
         Mail::send('Maintenance.mail',$data,function($message) use($data) {
         $message->from('thanathip.luis@gmail.com','maintenace');
         $message->to($data['email']);
         $message->subject($data['subject']);

     });
     return back()->with('success', 'Send E-mail Successfully');
    }
}
