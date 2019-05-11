<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data;
use App\User;
use Auth;
use DB;
use Illuminate\Support\Facades\Session;

class MainStatusRepairController extends Controller
{
    
    public function update( Request $request, $id)
    {   
        $this->validate($request, 
        [ 
          'statusCheck'=>'required',
          'repairman'=>'' ,
          'method'=>'',
          'remark'=>''
        ]); 
        $update = data::find($id); 
        $update->repairman = $request->get('repairman'); 
        $update->statusCheck = $request->get('statusCheck');
        $update->method = $request->get('method');
        $update->remark = $request->get('remark');
        $update->save(); 
        return back()->with('success', 'successfully');
    }
    public function alertfors1()
    {
        $data = data::WHERE('StatusCheck','=',1)->paginate (5);
        $s1 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=1 and deleted=0'));
            //dd($s1);
        $s2 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=2 and deleted=0'));
        $s3 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=3 and deleted=0'));
        $s4 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=4 and deleted=0'));
        $s5 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=5 and deleted=0'));
        $s6 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=6 and deleted=0'));
        $s7 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=7 and deleted=0'));
        $sAll = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck and deleted=0'));
            return view('maintenance.alertStatus1',compact('data','s1','s2','s3','s4','s5','s6','s7','sAll')); 
    }
    
    public function alertfors2()
    {
        $data = data::WHERE('StatusCheck','=',2)->paginate (5);
        $s1 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=1 and deleted=0'));
            //dd($s1);
        $s2 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=2 and deleted=0'));
        $s3 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=3 and deleted=0'));
        $s4 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=4 and deleted=0'));
        $s5 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=5 and deleted=0'));
        $s6 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=6 and deleted=0'));
        $s7 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=7 and deleted=0'));
        $sAll = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck and deleted=0'));
                
            return view('maintenance.alertStatus2',compact('data','s1','s2','s3','s4','s5','s6','s7','sAll')); 
    }
    public function alertfors3()
    {
        $data = data::WHERE('StatusCheck','=',3)->paginate (5);
        $s1 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=1 and deleted=0'));
            //dd($s1);
        $s2 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=2 and deleted=0'));
        $s3 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=3 and deleted=0'));
        $s4 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=4 and deleted=0'));
        $s5 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=5 and deleted=0'));
        $s6 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=6 and deleted=0'));
        $s7 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=7 and deleted=0'));
        $sAll = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck and deleted=0'));
            return view('maintenance.alertStatus3',compact('data','s1','s2','s3','s4','s5','s6','s7','sAll')); 
    }
    public function alertfors4()
    {
        $data = data::WHERE('StatusCheck','=',4)->paginate (5);
        $s1 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=1 and deleted=0'));
            //dd($s1);
        $s2 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=2 and deleted=0'));
        $s3 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=3 and deleted=0'));
        $s4 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=4 and deleted=0'));
        $s5 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=5 and deleted=0'));
        $s6 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=6 and deleted=0'));
        $s7 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=7 and deleted=0'));
        $sAll = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck and deleted=0'));
            return view('maintenance.alertStatus4',compact('data','s1','s2','s3','s4','s5','s6','s7','sAll')); 
    }
    public function alertfors5()
    {
        $data = data::WHERE('StatusCheck','=',5)->paginate (5);
        $s1 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=1 and deleted=0'));
            //dd($s1);
        $s2 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=2 and deleted=0'));
        $s3 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=3 and deleted=0'));
        $s4 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=4 and deleted=0'));
        $s5 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=5 and deleted=0'));
        $s6 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=6 and deleted=0'));
        $s7 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=7 and deleted=0'));
        $sAll = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck and deleted=0'));
            return view('maintenance.alertStatus5',compact('data','s1','s2','s3','s4','s5','s6','s7','sAll')); 
    }
    public function alertfors6()
    {
        $data = data::WHERE('StatusCheck','=',6)->paginate (5);
        //dd($data);

        $s1 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=1 and deleted=0'));
            //dd($s1);
        $s2 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=2 and deleted=0'));
        $s3 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=3 and deleted=0'));
        $s4 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=4 and deleted=0'));
        $s5 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=5 and deleted=0'));
        $s6 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=6 and deleted=0'));
        $s7 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=7 and deleted=0'));
        $sAll = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck and deleted=0'));
            return view('maintenance.alertStatus6',compact('data','s1','s2','s3','s4','s5','s6','s7','sAll')); 
    }
    public function alertfors7()
    {
       // $data =data::all();
         $data = data::WHERE('StatusCheck','=',7)->paginate (5);
        //     dd($data);

        $s1 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=1 and deleted=0'));
            //dd($s1);
        $s2 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=2 and deleted=0'));
        $s3 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=3 and deleted=0'));
        $s4 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=4 and deleted=0'));
        $s5 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=5 and deleted=0'));
        $s6 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=6 and deleted=0'));
        $s7 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=7 and deleted=0'));
        $sAll = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck and deleted=0'));
            return view('maintenance.alertStatus7',compact('data','s1','s2','s3','s4','s5','s6','s7','sAll')); 
    }
    public function process($id){
        $row=data::find($id);
        $s1 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=1 and deleted=0'));
            //dd($s1);
        $s2 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=2 and deleted=0'));
        $s3 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=3 and deleted=0'));
        $s4 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=4 and deleted=0'));
        $s5 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=5 and deleted=0'));
        $s6 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=6 and deleted=0'));
        $s7 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=7 and deleted=0'));
        $sAll = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck and deleted=0'));
        //dd($data);
        return view('maintenance.process',compact('row','s1','s2','s3','s4','s5','s6','s7','sAll'));
        }
}
