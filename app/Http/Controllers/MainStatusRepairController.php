<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data;
use App\User;
use Auth;
use Illuminate\Support\Facades\Session;

class MainStatusRepairController extends Controller
{
    
    public function update( Request $request, $id)
    {   
        $this->validate($request, 
        [ 
          'statusCheck'=>'required',
          'repairman'=>'' ,
          'method'=>'',
          'remark'=>''
        ]); 
        $update = data::find($id); 
        $update->repairman = $request->get('repairman'); 
        $update->statusCheck = $request->get('statusCheck');
        $update->method = $request->get('method');
        $update->remark = $request->get('remark');
        $update->save(); 
        return redirect('/datarepair')->with('success', 'อัพเดทเรียบร้อย');
    }
   
}
