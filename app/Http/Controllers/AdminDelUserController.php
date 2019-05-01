<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AdminDelUserController extends Controller
{
   
    public function update(Request $request, $id)
    {   
        $this->validate($request, 
        [ 
          
          'deleted'=>'required',
          
        ]); 
        $del = User::find($id); 
        $del->deleted = $request->get('deleted');
        $del->save(); 
        return back()->with('success', 'Successfully'); 
    }
}
