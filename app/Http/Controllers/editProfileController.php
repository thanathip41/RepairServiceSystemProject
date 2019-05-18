<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
class editProfileController extends Controller
{
    public function index()
    {
       $whereid=Auth::user()->id;
       $editPro = User::WHERE('id','=',$whereid)->paginate ();
      // dd($editPro);
	    return view('editProfile', compact('editPro')); 
    }
    public function update(Request $request,$id)
    {
    $this->validate($request, 
        [ 
          'name'=>'required',
          'department'=>'required',
          'email'=>'required',
          
        ]); 
        $changeRole = User::find($id); 
        $changeRole->name = $request->get('name');
        $changeRole->department = $request->get('department');
        $changeRole->email = $request->get('email');
        $changeRole->save();
        return back()->with('success', 'Successfully');
    }
}
