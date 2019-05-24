<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data;
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
            DB::raw("select count(*) as number from data where statusCheck=1 and deleted=0"));
        return view('user.InsertRepair', compact('s1')); 
    }
    public function store(Request $request)
    {
        $s1 = DB::select( 
            DB::raw("select count(*) as number from data"));
        $this->validate($request, 
        [   'productCode' => 'required|max:10', 'problem' => 'required', 
             'img'=>  'image|mimes:jpg,jpeg,png|max:2048'
        ]); 
        $input = new data(
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
            DB::raw("select count(*) as number from data where statusCheck=1 and deleted=0"));
       $whereID=Auth::user()->id;
       $history = data::WHERE('idM','=',$whereID)->WHERE('deleted','=',0)->paginate (5);
        return view('user.history', compact('history','s1'))->with('success', 'Successfully'); 
    }
    
    public function alertUser()
    {
        $whereID=Auth::user()->id;
        $alertUser  = data::WHERE('idM','=',$whereID)->WHERE('StatusCheck','=',3)->WHERE('deleted','=',0)->paginate (5);
       // dd($alertUser);
        return view('user.alertUser', compact('alertUser')); 
    }
    public function process($id){
        $row=data::find($id);
        return view('user.process',compact('row'));
        }
}
