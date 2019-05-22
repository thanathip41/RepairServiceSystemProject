<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use Illuminate\Support\Facades\Storage;
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
          'email'=>'required',
          'img'=>'image|mimes:jpg,jpeg,png|max:2048',
        ]); 
        $edit = User::find($id); 
        $edit->name = $request->get('name');
        $edit->email = $request->get('email');
        if ($request->has('img')){
        $edit->img = $request->file('img')->store('profile','public');
        }
        $edit->save();
        return back()->with('success', 'Successfully');
    }

    
}
