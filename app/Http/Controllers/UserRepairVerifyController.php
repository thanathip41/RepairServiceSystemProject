<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data_repair;
use Auth;
use Illuminate\Support\Facades\Session;

class UserRepairVerifyController extends Controller
{
    public function update(Request $request, $id)
    {   
        $this->validate($request, 
        [ 
          'statusCheck'=>'required',
        ]); 
        $update = data_repair::find($id); 
        $update->statusCheck =$request->get('statusCheck');
        $update->save(); 
        return back()->with('success', 'Successfully');
    }
}
