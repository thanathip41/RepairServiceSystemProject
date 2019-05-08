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
        $users = User::all(); 
        $s1 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=1'));
        $s2 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=2'));
        $s3 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=3'));
        $s4 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=4'));
        $s5 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=5'));
        $s6 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=6'));
                $s7 = DB::select( 
                    DB::raw('select count(*) as number from data where statusCheck=7'));
        $sAll = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck'));
	    return view('editProfile', compact('users','s1','s2','s3','s4','s5','s6','s7','sAll')); 
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
