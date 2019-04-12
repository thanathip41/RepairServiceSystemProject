<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data;
use Illuminate\Support\Facades\Session;
class AdminController extends Controller
{
    public function index()
    {
        
        $admin = data::all();  
        return view('user.admincheck', compact('admin')); 
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, 
        [ 
          'delete'=>'required'
        
        ]); 
        $update = data::find($id); 
        $update->delete = $request->get('delete');
        $update->save(); 
        return back()->with('success', 'อัพเดทเรียบร้อย');
    }
}
