<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
class AdminController extends Controller
{
    public function index()
    {
        $admin=data::WHERE('deleted','=',0)->paginate(5);
        return view('admin.manageData', compact('admin')); 
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, 
        [ 
          'deleted'=>'required'
        
        ]); 
        $update = data::find($id); 
        $update->deleted = $request->get('deleted');
        $update->save(); 
        return back()->with('success', 'Successfully');
    }
    public function process($id){
        $row=data::find($id);
        return view('admin.process',compact('row'));
        }
}
