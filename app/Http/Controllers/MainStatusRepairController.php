<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data;
use App\User;
use Auth;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
class MainStatusRepairController extends Controller
{
    
    public function update( Request $request, $id)
    {   
        $this->validate($request, 
        [ 
          'statusCheck'=>'required',
          'repairman'=>'' ,
          'method'=>'',
          'remark'=>'',
          'type_return'=> '',
        ]); 
        $update = data::find($id); 
        $update->repairman = $request->get('repairman'); 
        $update->statusCheck = $request->get('statusCheck');
        $update->method = $request->get('method');
        $update->remark = $request->get('remark');
        $update->type_return = $request->get('type_return');
        $update->save(); 
        return back()->with('success', 'successfully');
    }
    public function process($id){
        $row=data::find($id);
        return view('maintenance.process',compact('row'));
        }
}
