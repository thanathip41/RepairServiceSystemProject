<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data;
use Auth;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
class UserInsertRepairController extends Controller
{

    public function index()
    {
        $id=Auth::user()->id;

    
        $s1 = DB::select( 
            DB::raw("select count(*) as number from data where statusCheck=1 and deleted=0"));
           // dd($s1);
        return view('user.InsertRepair', compact('s1')); 
        //อ้างอิงตำแหน่งของ view 
    }
    public function store(Request $request)
    {

        $this->validate($request, 
        [   'productCode' => 'required|max:12', 'problem' => 'required', 
             'img'=>  'image|mimes:jpg,jpeg,png,gif|max:2048'
        ]); 
        $input = new data(
            [ 'idM'=>Auth::user()->id,
              'productCode' =>('NP2019-').$request->get('productCode'), 
              'problem' => $request->get('problem'),
              'type_id'=>$request->get('type_id'),
              'id'=>('MT-').date('mdHis') ,
 
            ]);
            if ($request->has('img')){
                //$input->update(['img'=>$request->file('img')->store('image')]);
           //$input->img =$request->file('img')->store('public');
          $input->img=$request->file('img')->store('image','public');
            }
            
            //$input = Storage::putFile('img', $request->file('img'));
            $input->save();
         sleep(1.5);
         return redirect('/insert')->with('success', 'Successfully');
        //return redirect()->route('user.index')->with('success', 'บันทึกข้อมูลเรียบร้อย'); 
    }
    public function history() 
    {
       $whereID=Auth::user()->id;
       $history = data::WHERE('idM','=',$whereID)->paginate (5);
        return view('user.history', compact('history'))->with('success', 'Successfully'); 
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
        //dd($data);
        return view('user.process',compact('row'));
        }
    public function img(){
        return view('user.img');
    }
}
