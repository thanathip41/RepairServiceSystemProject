<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data_repair;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
class AdminDataRepairController extends Controller
{
    public function index()
    {
        $admin=data_repair::WHERE('deleted','=',0)->paginate(5);
        return view('admin.manageData', compact('admin')); 
    }
    public function restoreData()
    {
        $admin=data_repair::WHERE('deleted','=',1)->paginate(5);
        return view('admin.restoreData', compact('admin')); 
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, 
        [ 
          'deleted'=>'required'
        
        ]); 
        $update = data_repair::find($id); 
        $update->deleted = $request->get('deleted');
        $update->save(); 
        return back()->with('success', 'Successfully');
    }
    public function process($id){
        $row=data_repair::find($id);
        return view('admin.process',compact('row'));
        }
}
