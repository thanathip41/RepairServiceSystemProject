<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data_repair;
use Auth;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
class UserInsertRepairController extends Controller
{

    public function index()
    {
        $s1 = DB::select( 
            DB::raw("select count(*) as number from data_repair where statusCheck=1 and deleted=0"));
            $s3 = DB::select( 
                DB::raw("select count(*) as number from data_repair where statusCheck=3 and deleted=0"));
        return view('user.InsertRepair', compact('s1','s3')); 
    }
    public function store(Request $request)
    {
        $s1 = DB::select( 
            DB::raw("select count(*) as number from data_repair"));
        $this->validate($request, 
        [   'productCode' => 'required|max:10', 'problem' => 'required', 
             'img'=>  'image|mimes:jpg,jpeg,png|max:2048'
        ]); 
        $input = new data_repair(
            [ 'idM'=>Auth::user()->id,
              'productCode' =>('NPC-').$request->get('productCode'), 
              'problem' => $request->get('problem'),
              'type_id'=>$request->get('type_id'),
              'id'=>('MT-').date('mdHis'),
 
            ]);
            if ($request->has('img')){
          $input->img=$request->file('img')->store('image','public');
            }
            $input->save();
         sleep(1.5);
         return redirect('/insert')->with('success', 'Successfully');
        //return redirect()->route('user.index')->with('success', 'บันทึกข้อมูลเรียบร้อย'); 
    }
    public function history() 
    {
        $s1 = DB::select( 
            DB::raw("select count(*) as number from data_repair where statusCheck=1 and deleted=0"));
            $s3 = DB::select( 
                DB::raw("select count(*) as number from data_repair where statusCheck=3 and deleted=0"));
       $whereID=Auth::user()->id;
       $history = data_repair::WHERE('idM','=',$whereID)->WHERE('deleted','=',0)->paginate (5);
        return view('user.history', compact('history','s1','s3'))->with('success', 'Successfully'); 
    }
    
    public function accept()
    {
        $s3 = DB::select( 
            DB::raw("select count(*) as number from data_repair where statusCheck=3 and deleted=0"));
        $whereID=Auth::user()->id;
        $accept  = data_repair::WHERE('idM','=',$whereID)->WHERE('StatusCheck','=',3)->WHERE('deleted','=',0)->paginate (5);
       // dd($alertUser);
        return view('user.accept', compact('accept','s3'))->with('success', 'Successfully'); 
    }
    public function process($id){
        $row=data_repair::find($id);
        return view('user.process',compact('row'));
        }
}
