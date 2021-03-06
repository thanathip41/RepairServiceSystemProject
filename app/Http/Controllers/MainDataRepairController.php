<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data_repair;
use App\User;
use Auth;
use PDF;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
class MainDataRepairController extends Controller
{
    public function index()
    {
        $datarepair = data_repair::WHERE('deleted','=',0)->WHERE('status_id','!=',4)->paginate(5);
        $s1 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=1 and deleted=0'));
        $s2 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=2 and deleted=0'));
        $s3 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=3 and deleted=0'));
        $s4 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=4 and deleted=0'));
        $s5 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=5 and deleted=0'));
        $s6 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=6 and deleted=0'));
        $s7 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=7 and deleted=0'));
        $sAll = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id and deleted=0'));

      
        return view('maintenance.dataRepair', compact('datarepair','s1','s2','s3','s4','s5','s6','s7','sAll')); 
        //  ชื่อ database data.. แสดงข้อมูลใน database
    }
    public function PDF($id) {
        $PDF=data_repair::find($id);
        $view=\View::make('maintenance.pdf',compact('PDF'));
        $html=$view->render();
        $pdf=new PDF();
        $pdf::SetTitle('รายงานการแจ้งซ่อม');
        $pdf::Addpage();
        $pdf::SetFont('freeserif');
        $pdf::WriteHTML($html,true,false,true,false);
        $pdf::Output('report.pdf');
    }
public function searchCode()

 {      $s1 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=1 and deleted=0'));
        $s2 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=2 and deleted=0'));
        $s3 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=3 and deleted=0'));
        $s4 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=4 and deleted=0'));
        $s5 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=5 and deleted=0'));
        $s6 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=6 and deleted=0'));
        $s7 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=7 and deleted=0'));
        $sAll = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id and deleted=0'));
        
    $searching = Input::get ('searchCode');
    if($searching != "")
    {
    $query=data_repair::WHERE('productCode', 'like', '%' . $searching . '%' )->WHERE( 'deleted','=',0)->paginate (5);
    $pagination = $query->appends(array('searchCode'=> Input::get ('searchCode' )));
if (count ($query) > 0)
    return view ( 'maintenance.dataRepair',compact('s1','s2','s3','s4','s5','s6','s7','sAll') )->withquery($query)->withq($searching);
}
    return view ( 'maintenance.dataRepair',compact('s1','s2','s3','s4','s5','s6','s7','sAll') )->withMessage ( 'No Details found. Try to search again !' );
}
public function searchName()

 {      $s1 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=1 and deleted=0'));
        $s2 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=2 and deleted=0'));
        $s3 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=3 and deleted=0'));
        $s4 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=4 and deleted=0'));
        $s5 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=5 and deleted=0'));
        $s6 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=6 and deleted=0'));
        $s7 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=7 and deleted=0'));
        $sAll = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id and deleted=0'));
        
    $searching = Input::get ('searchName');
    if($searching != "")
    {
    $query=data_repair::WhereHas('users', function ($query) use ($searching) {
        $query->where('name', 'like', '%' . $searching . '%')->WHERE( 'deleted','=',0);
    })->paginate(5);
    $pagination = $query->appends(array('searchName'=> Input::get ('searchName' )));
if (count ($query) > 0)
    return view ( 'maintenance.dataRepair',compact('s1','s2','s3','s4','s5','s6','s7','sAll') )->withquery($query)->withq($searching);
}
    return view ( 'maintenance.dataRepair',compact('s1','s2','s3','s4','s5','s6','s7','sAll') )->withMessage ( 'No Details found. Try to search again !' );
}

public function searchDate()
 {   
     $s1 = DB::select( 
    DB::raw('select count(*) as number from data_repair where status_id=1 and deleted=0'));
    //dd($s1);
$s2 = DB::select( 
    DB::raw('select count(*) as number from data_repair where status_id=2 and deleted=0'));
$s3 = DB::select( 
    DB::raw('select count(*) as number from data_repair where status_id=3 and deleted=0'));
$s4 = DB::select( 
    DB::raw('select count(*) as number from data_repair where status_id=4 and deleted=0'));
$s5 = DB::select( 
    DB::raw('select count(*) as number from data_repair where status_id=5 and deleted=0'));
$s6 = DB::select( 
    DB::raw('select count(*) as number from data_repair where status_id=6 and deleted=0'));
$s7 = DB::select( 
    DB::raw('select count(*) as number from data_repair where status_id=7 and deleted=0'));
$sAll = DB::select( 
    DB::raw('select count(*) as number from data_repair where status_id and deleted=0'));
     $searching = Input::get ('searchDate');
    if($searching != "")
    {
    $query=data_repair::WHEREDATE( 'created_at', 'like', '%' . $searching . '%')->WHERE( 'deleted','=',0)->paginate(5);
    $pagination = $query->appends(array('searchDate'=> Input::get ( 'searchDate' )));
if (count ($query) > 0)
    return view ( 'maintenance.dataRepair',compact('s1','s2','s3','s4','s5','s6','s7','sAll'))->withquery($query)->withq($searching);
}
    return view ( 'maintenance.dataRepair' ,compact('s1','s2','s3','s4','s5','s6','s7','sAll'))->withMessage ( 'No Details found. Try to search again !' );
}


public function searchDateBetween()
 {  $s1 = DB::select( 
    DB::raw('select count(*) as number from data_repair where status_id=1 and deleted=0'));
    //dd($s1);
$s2 = DB::select( 
    DB::raw('select count(*) as number from data_repair where status_id=2 and deleted=0'));
$s3 = DB::select( 
    DB::raw('select count(*) as number from data_repair where status_id=3 and deleted=0'));
$s4 = DB::select( 
    DB::raw('select count(*) as number from data_repair where status_id=4 and deleted=0'));
$s5 = DB::select( 
    DB::raw('select count(*) as number from data_repair where status_id=5 and deleted=0'));
$s6 = DB::select( 
    DB::raw('select count(*) as number from data_repair where status_id=6 and deleted=0'));
$s7 = DB::select( 
    DB::raw('select count(*) as number from data_repair where status_id=7 and deleted=0'));
$sAll = DB::select( 
    DB::raw('select count(*) as number from data_repair where status_id and deleted=0'));
     
    $searching = Input::get ('searchDatefrom');
    $search = Input::get ('searchDateto');
    if($searching != "" && $search != "")
    {
    $query=data_repair::WHEREDATE( 'created_at', '>=',$searching)->WHEREDATE('created_at', '<=',$search)->WHERE( 'deleted','=',0)->paginate (5);
    $pagination = $query->appends(array('searchDatefrom'=> Input::get ( 'searchDatefrom' )));
    $pagination = $query->appends(array('searchDateto'=> Input::get ( 'searchDateto' )));
if (count ($query) > 0)
    return view ( 'maintenance.dataRepair' ,compact('s1','s2','s3','s4','s5','s6','s7','sAll'))->withquery($query);
}
    return view ( 'maintenance.dataRepair' ,compact('s1','s2','s3','s4','s5','s6','s7','sAll'))->withMessage ( 'No Details found. Try to search again !' );
}

public function searchStatus()

 {   
     $s1 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=1 and deleted=0'));
        $s2 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=2 and deleted=0'));
        $s3 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=3 and deleted=0'));
        $s4 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=4 and deleted=0'));
        $s5 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=5 and deleted=0'));
        $s6 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=6 and deleted=0'));
        $s7 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=7 and deleted=0'));
        $sAll = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id and deleted=0'));
        
    $searching = Input::get ('searchStatus');
    if($searching != "")
    {
    $query=data_repair::WHERE('status_id', 'like', '%' . $searching . '%' )->WHERE( 'deleted','=',0)->paginate (5);
 $pagination = $query->appends(array('searchStatus'=> Input::get ( 'searchStatus' )));
if (count ($query) > 0)
    return view ( 'maintenance.dataRepair',compact('s1','s2','s3','s4','s5','s6','s7','sAll') )->withquery($query)->withq($searching);
}
    return view ( 'maintenance.dataRepair',compact('s1','s2','s3','s4','s5','s6','s7','sAll') )->withMessage ( 'No Details found. Try to search again !' );
}

}
