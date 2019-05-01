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
        $s1 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=1'));
        return view('user.InsertRepair', compact('s1')); 
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
              'type_id'=>$request->get('type_id'),
              'id'=>('MT-').date('mdHis') ,//mt_rand(000,999)   Ymdhis //str.random(3) //.date('dhis')
              
            ]);
         $input->save();
         sleep(1.5);
         return redirect('/insert')->with('success', 'Successfully');
        //return redirect()->route('user.index')->with('success', 'บันทึกข้อมูลเรียบร้อย'); 
    }
    public function history() {
        $history = data::paginate(5);
       // dd($history) ; //paginate() 
        return view('user.history', compact('history'))->with('success', 'Successfully'); 
    }
    
    public function process($id){
        $row=data::find($id);
        //dd($data);
        return view('user.process',compact('row'));
        }
    
}
