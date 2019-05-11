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
          
          'activated'=>'required',
          
        ]); 
        $del = User::find($id); 
        $del->activated = $request->get('activated');
        $del->save(); 
        return back()->with('success', 'Successfully'); 
    }
}
