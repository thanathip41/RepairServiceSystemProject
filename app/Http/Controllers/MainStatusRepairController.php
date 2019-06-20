<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data_repair;
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
          'status_id'=>'required',
          'repairman'=>'' ,
          'method'=>'',
          'remark'=>'',
          'date_return'=> '',
        ]); 
        $update = data_repair::find($id); 
        $update->repairman = $request->get('repairman'); 
        $update->status_id = $request->get('status_id');
        $update->method = $request->get('method');
        $update->remark = $request->get('remark');
        $update->date_return = $request->get('date_return');
        $update->save(); 
        return back()->with('success', 'successfully');
    }
    public function process($id){
        $row=data_repair::find($id);
        return view('maintenance.process',compact('row'));
        }
}
