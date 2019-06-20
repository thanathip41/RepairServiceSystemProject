<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data_repair;
use PDF;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
class AdminDataRepairController extends Controller
{
    public function index()
    {
        $admin=data_repair::WHERE('deleted','=',0)->paginate(5);
        return view('admin.manageData', compact('admin')); 
    }
    public function restoreData()
    {
        $admin=data_repair::WHERE('deleted','=',1)->paginate(5);
        return view('admin.restoreData', compact('admin')); 
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, 
        [ 
          'deleted'=>'required'
        
        ]); 
        $update = data_repair::find($id); 
        $update->deleted = $request->get('deleted');
        $update->save(); 
        return back()->with('success', 'Successfully');
    }
    public function process($id){
        $row=data_repair::find($id);
        return view('admin.process',compact('row'));
        }
    public function PDF($id) {
            $PDF=data_repair::find($id);
            $view=\View::make('admin.pdf',compact('PDF'));
            $html=$view->render();
            $pdf=new PDF();
            $pdf::SetTitle('รายงานการแจ้งซ่อม');
            $pdf::Addpage();
            $pdf::SetFont('freeserif');
            $pdf::WriteHTML($html,true,false,true,false);
            $pdf::Output('report.pdf');
        }
public function searchCode()
 {      
      
    $searching = Input::get ('searchCode');
    if($searching != "")
    {
    $query=data_repair::WHERE('productCode', 'like', '%' . $searching . '%' )->WHERE( 'deleted','=',0)->paginate (5);
    $pagination = $query->appends(array('searchCode'=> Input::get ('searchCode' )));
if (count ($query) > 0)
    return view ( 'admin.manageData' )->withquery($query)->withq($searching);
}
    return view ( 'admin.manageData' )->withMessage ( 'No Details found. Try to search again !' );
}
public function searchName()

 {     
    $searching = Input::get ('searchName');
    if($searching != "")
    {
    $query=data_repair::WhereHas('users', function ($query) use ($searching) {
        $query->where('name', 'like', '%' . $searching . '%')->WHERE( 'deleted','=',0);
    })->paginate(5);
    $pagination = $query->appends(array('searchName'=> Input::get ('searchName' )));
if (count ($query) > 0)
    return view ( 'admin.manageData' )->withquery($query)->withq($searching);
}
    return view ( 'admin.manageData')->withMessage ( 'No Details found. Try to search again !' );
}

public function searchDate()
 {   
    
     $searching = Input::get ('searchDate');
    if($searching != "")
    {
    $query=data_repair::WHEREDATE( 'created_at', 'like', '%' . $searching . '%')->WHERE( 'deleted','=',0)->paginate(5);
    $pagination = $query->appends(array('searchDate'=> Input::get ( 'searchDate' )));
if (count ($query) > 0)
    return view ( 'admin.manageData')->withquery($query)->withq($searching);
}
    return view ( 'admin.manageData' )->withMessage ( 'No Details found. Try to search again !' );
}


public function searchDateBetween()
 { 
    $searching = Input::get ('searchDatefrom');
    $search = Input::get ('searchDateto');
    if($searching != "" && $search != "")
    {
    $query=data_repair::WHEREDATE( 'created_at', '>=',$searching)->WHEREDATE('created_at', '<=',$search)->WHERE( 'deleted','=',0)->paginate (5);
    $pagination = $query->appends(array('searchDatefrom'=> Input::get ( 'searchDatefrom' )));
    $pagination = $query->appends(array('searchDateto'=> Input::get ( 'searchDateto' )));
if (count ($query) > 0)
    return view ( 'admin.manageData')->withquery($query);
}
    return view ( 'admin.manageData')->withMessage ( 'No Details found. Try to search again !' );
}
}
