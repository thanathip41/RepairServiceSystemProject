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
        return redirect('/datarepair')->with('success', 'successfully');
    }
    public function alertfors1()
    {
        $data =data::all();
        $s1 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=1'));
            $s2 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=2'));
            $s3 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=3'));
            $s4 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=4'));
            $s5 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=5'));
            $s6 = DB::select( 
                    DB::raw('select count(*) as number from data where statusCheck=6'));
            $sAll = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck'));
            return view('maintenance.alertStatus1',compact('data','s1','s2','s3','s4','s5','s6','sAll')); 
    }
    
    public function alertfors2()
    {
        $data =data::all();
        $s1 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=1'));
            $s2 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=2'));
            $s3 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=3'));
            $s4 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=4'));
            $s5 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=5'));
            $s6 = DB::select( 
                    DB::raw('select count(*) as number from data where statusCheck=6'));
            $sAll = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck'));
            return view('maintenance.alertStatus2',compact('data','s1','s2','s3','s4','s5','s6','sAll')); 
    }
    public function alertfors3()
    {
        $data =data::all();
        $s1 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=1'));
            $s2 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=2'));
            $s3 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=3'));
            $s4 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=4'));
            $s5 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=5'));
            $s6 = DB::select( 
                    DB::raw('select count(*) as number from data where statusCheck=6'));
            $sAll = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck'));
            return view('maintenance.alertStatus3',compact('data','s1','s2','s3','s4','s5','s6','sAll')); 
    }
    public function alertfors4()
    {
        $data =data::all();
        $s1 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=1'));
            $s2 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=2'));
            $s3 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=3'));
            $s4 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=4'));
            $s5 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=5'));
            $s6 = DB::select( 
                    DB::raw('select count(*) as number from data where statusCheck=6'));
            $sAll = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck'));
            return view('maintenance.alertStatus4',compact('data','s1','s2','s3','s4','s5','s6','sAll')); 
    }
    public function alertfors5()
    {
        $data =data::all();
        $s1 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=1'));
            $s2 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=2'));
            $s3 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=3'));
            $s4 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=4'));
            $s5 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=5'));
            $s6 = DB::select( 
                    DB::raw('select count(*) as number from data where statusCheck=6'));
            $sAll = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck'));
            return view('maintenance.alertStatus5',compact('data','s1','s2','s3','s4','s5','s6','sAll')); 
    }
    public function alertfors6()
    {
        $data =data::all();
        $s1 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=1'));
            $s2 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=2'));
            $s3 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=3'));
            $s4 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=4'));
            $s5 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=5'));
            $s6 = DB::select( 
                    DB::raw('select count(*) as number from data where statusCheck=6'));
            $sAll = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck'));
            return view('maintenance.alertStatus6',compact('data','s1','s2','s3','s4','s5','s6','sAll')); 
    }
    public function process($id){
        $row=data::find($id);
        $s1 = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck=1'));
            $s2 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=2'));
            $s3 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=3'));
            $s4 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=4'));
            $s5 = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck=5'));
            $s6 = DB::select( 
                    DB::raw('select count(*) as number from data where statusCheck=6'));
            $sAll = DB::select( 
                DB::raw('select count(*) as number from data where statusCheck'));
        //dd($data);
        return view('maintenance.process',compact('row','s1','s2','s3','s4','s5','s6','sAll'));
        }
}
