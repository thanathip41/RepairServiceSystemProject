<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data;
use Auth;
use DB;
use Illuminate\Support\Facades\Session;
class UserInsertRepairController extends Controller
{

    public function create()
    {
        return view('user.InsertRepair');
        //อ้างอิงตำแหน่งของ view 
    }
    public function store(Request $request)
    {

        $this->validate($request, 
        [   'productCode' => 'required', 'problem' => 'required', 
        ]); 
        $input = new data(
            [ 'idM'=>Auth::user()->id,
              'productCode' => $request->get('productCode'), 
              'problem' => $request->get('problem'),
              'type_id'=>$request->get('typename'),
              'id'=>('MT-').date('dHis') ,//mt_rand(000,999)   Ymdhis //str.random(3) //.date('dhis')
              
            ]);
         $input->save();
         return back()->with('success', 'อัพเดทเรียบร้อย');
        //return redirect()->route('user.index')->with('success', 'บันทึกข้อมูลเรียบร้อย'); 
    }
    public function history() {
        $history = data::all();
        return view('user.history', compact('history'))->with('success', 'เรียบร้อย'); 
    }

    
}
