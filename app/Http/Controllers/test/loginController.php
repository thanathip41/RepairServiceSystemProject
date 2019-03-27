<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class loginController extends Controller
{
    function index(){
        return view('login');
    }
    function checklogin(Request $request){
        $this->validate($request,[
            'email'=> 'required',
           'password'=> 'required'
        ]);
        $user=array(
        'email'=> $request->get('email'), //get จาก takebox email
        'password'=> $request->get('pasword')
        );
        if (Auth::attempt($user)){
            return redirect('login/successlogin');
        }
        else{
            return back()->with('eror','เกิดข้อผิดพลาด');
        }
    }
    function successlogin(){
        return view('successlogin');
    }
}
