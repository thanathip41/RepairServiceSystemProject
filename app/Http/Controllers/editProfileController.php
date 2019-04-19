<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class editProfileController extends Controller
{
    public function index()
    {
        $users = User::all(); 
	    return view('admin.editProfile', compact('users')); 
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
        return back()->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }
}
