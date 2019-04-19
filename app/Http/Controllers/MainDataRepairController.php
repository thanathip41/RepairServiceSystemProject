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
        
        $data = data::paginate();  /// User = ตัวใน http/controller/_name file
        //$showdata = Data::all(); 
        return view('maintenance.index', compact('data')); 
        //  ชื่อ database data.. แสดงข้อมูลใน database
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
        return redirect('maintenance.index')->with('success', 'อัพเดทเรียบร้อย');
    }
    public function downloadPDF($id) {
        $PDF=data::find($id);
        $view=\View::make('maintenance.pdf',compact('PDF'));
        $html=$view->render();
        $pdf=new PDF();
        $pdf::SetTitle('รายงาน PDF');
        $pdf::Addpage();
        $pdf::SetFont('freeserif');
        $pdf::WriteHTML($html,true,false,true,false);
        $pdf::Output('report.pdf');
    }
 public function searchID()

 { $searching = Input::get ('searchID');
    if($searching != "")
    {
    $query=data::WHERE( 'id', 'like', '%' . $searching . '%' )->paginate (50);
// $pagination = $query->appends(array('searching'=> Input::get ( 'searching' )));
if (count ($query) > 0)
    return view ( 'maintenance.index' )->withquery($query)->withq($searching);
}
    return view ( 'maintenance.index' )->withMessage ( 'No Details found. Try to search again !' );
}
public function searchCode()

 { $searching = Input::get ('searchCode');
    if($searching != "")
    {
    $query=data::WHERE( 'productCode', 'like', '%' . $searching . '%' )->paginate (20);
     
// $pagination = $query->appends(array('searching'=> Input::get ( 'searching' )));
if (count ($query) > 0)
    return view ( 'maintenance.index' )->withquery($query)->withq($searching);
}
    return view ( 'maintenance.index' )->withMessage ( 'No Details found. Try to search again !' );
}

public function searchDate()
 { $searching = Input::get ('searchDate');
    if($searching != "")
    {
    $query=data::WHEREDATE( 'created_at', 'like', '%' . $searching . '%')->paginate(20);
if (count ($query) > 0)
    return view ( 'maintenance.index' )->withquery($query)->withq($searching);
}
    return view ( 'maintenance.index' )->withMessage ( 'No Details found. Try to search again !' );
}


public function searchDateBetween()
 { $searching = Input::get ('searchDatefrom');
    $search = Input::get ('searchDateto');
    if($searching != "")
    {
    $query=data::WHEREDATE( 'created_at', '>=',$searching)->WHEREDATE('created_at', '<=',$search)->paginate (10);
if (count ($query) > 0)
    return view ( 'maintenance.index' )->withquery($query)->withq($searching);
}
    return view ( 'maintenance.index' )->withMessage ( 'No Details found. Try to search again !' );
}

}
