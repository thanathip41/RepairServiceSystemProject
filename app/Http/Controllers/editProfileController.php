<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\data_repair;
use Auth;
use DB;
use Illuminate\Support\Facades\Storage;
class editProfileController extends Controller
{
    public function index()
    { 
      
       $whereid=Auth::user()->id;
       $editPro = User::WHERE('id','=',$whereid)->paginate();
       $id=Auth::user()->id;
       $s3 = DB::select( 
      DB::raw("select count(*) as number from data_repair where status_id=3 and idM='$id' and deleted=0"));
      //dd($editPro);
	    return view('editProfile', compact('editPro','s3')); 
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
