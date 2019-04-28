<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data;
use Auth;
use PDF;
use DB;
//use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
class MainDataRepairController extends Controller
{
    public function index()
    {
        
        $data = data::paginate(30);  /// User = ตัวใน http/controller/_name file
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

            
                    
        return view('maintenance.index', compact('data','s1','s2','s3','s4','s5','s6','sAll')); 
        //  ชื่อ database data.. แสดงข้อมูลใน database
    }

    public function navbar()
    {
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
           
        return view('layouts.navbar', compact('s1','s2','s3','s4','s5','s6','sAll')); 
        //  ชื่อ database data.. แสดงข้อมูลใน database
    }

  
    public function alert()
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
            return view('maintenance.alertStatus',compact('data','s1','s2','s3','s4','s5','s6','sAll')); 
        
    }
   
    public function update(Request $request, $id)
    {
        $this->validate($request, 
        [ 
          'repairman'=>'required' ,
          'statusCheck'=>'required',
          'method'=>'required',
          'remark'=>''
        ]); 
        $update = data::find($id); 
        dd($id);
        $update->repairman = $request->get('repairman'); 
        $update->statusCheck = $request->get('statusCheck');
        $update->method = $request->get('method');
        $update->remark = $request->get('remark');
        $update->save(); 
        return redirect('maintenance.index')->with('success', 'Successfully');
    }
    public function PDF($id) {
        $PDF=data::find($id);
        $view=\View::make('maintenance.pdf',compact('PDF'));
        $html=$view->render();
        $pdf=new PDF();
        $pdf::SetTitle('รายงานการแจ้งซ่อม');
        $pdf::Addpage();
        $pdf::SetFont('freeserif');
        $pdf::WriteHTML($html,true,false,true,false);
        $pdf::Output('report.pdf');
    }
 public function searchID()

   {    $s1 = DB::select( 
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
     
    $searching = Input::get ('searchID');
    if($searching != "")
    {
    $query=data::WHERE( 'id', 'like', '%' . $searching . '%' )->paginate (50);
// $pagination = $query->appends(array('searching'=> Input::get ( 'searching' )));
if (count ($query) > 0)
    return view ( 'maintenance.index',compact('s1','s2','s3','s4','s5','s6','sAll'))->withquery($query)->withq($searching);
}
    return view ( 'maintenance.index',compact('s1','s2','s3','s4','s5','s6','sAll') )->withMessage ( 'No Details found. Try to search again !' );
}
public function searchCode()

 {   $s1 = DB::select( 
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


    $searching = Input::get ('searchCode');
    if($searching != "")
    {
    $query=data::WHERE( 'productCode', 'like', '%' . $searching . '%' )->paginate (20);
     
// $pagination = $query->appends(array('searching'=> Input::get ( 'searching' )));
if (count ($query) > 0)
    return view ( 'maintenance.index',compact('s1','s2','s3','s4','s5','s6','sAll') )->withquery($query)->withq($searching);
}
    return view ( 'maintenance.index',compact('s1','s2','s3','s4','s5','s6','sAll') )->withMessage ( 'No Details found. Try to search again !' );
}

public function searchDate()
 {   $s1 = DB::select( 
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
     $searching = Input::get ('searchDate');
    if($searching != "")
    {
    $query=data::WHEREDATE( 'created_at', 'like', '%' . $searching . '%')->paginate(20);
if (count ($query) > 0)
    return view ( 'maintenance.index',compact('s1','s2','s3','s4','s5','s6','sAll'))->withquery($query)->withq($searching);
}
    return view ( 'maintenance.index' ,compact('s1','s2','s3','s4','s5','s6','sAll'))->withMessage ( 'No Details found. Try to search again !' );
}


public function searchDateBetween()
 { $s1 = DB::select( 
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
     
    $searching = Input::get ('searchDatefrom');
    $search = Input::get ('searchDateto');
    if($searching != "")
    {
    $query=data::WHEREDATE( 'created_at', '>=',$searching)->WHEREDATE('created_at', '<=',$search)->paginate (10);
if (count ($query) > 0)
    return view ( 'maintenance.index' ,compact('s1','s2','s3','s4','s5','s6','sAll'))->withquery($query)->withq($searching);
}
    return view ( 'maintenance.index' ,compact('s1','s2','s3','s4','s5','s6','sAll'))->withMessage ( 'No Details found. Try to search again !' );
}

}
