<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data;
use Auth;
use Illuminate\Support\Facades\Session;

class status2Controller extends Controller
{
    public function edit($id)
    {
        $edit = data::find($id); 
	    return view('user.test', compact('edit', 'id')); 
    }
    public function update(Request $request, $id)
    {   
        $this->validate($request, 
        [ 
          'statusCheck'=>'required',
       
        ]); 
        $update = data::find($id); 
        $update->statusCheck = $request->get('statusCheck');
        $update->save(); 
        return redirect()->route('user.index')->with('success', 'อัพเดทเรียบร้อย');
    }

}
