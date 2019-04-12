<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data;
use Auth;
use PDF;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
class dataController extends Controller
{
    public function index()
    {
        
        $data = data::paginate(10);  /// User = ตัวใน http/controller/_name file
        //$showdata = Data::all(); 
        return view('user.index', compact('data')); 
        //  ชื่อ database :data แสดงข้อมูลใน database
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
        return redirect()->route('user.index')->with('success', 'อัพเดทเรียบร้อย');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($id)
    {
        
        $del = data::find($id); 
        $del->delete(); 
        return redirect()->route('user.index')->with('success', 'ลบข้อมูลเรียบร้อย');
    }*/
    public function downloadPDF($id) {
        $PDF=data::find($id);
        $view=\View::make('user.pdf',compact('PDF'));
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
    return view ( 'user.index' )->withquery($query)->withq($searching);
}
    return view ( 'user.index' )->withMessage ( 'No Details found. Try to search again !' );
}
public function searchCode()

 { $searching = Input::get ('searchCode');
    if($searching != "")
    {
    $query=data::WHERE( 'productCode', 'like', '%' . $searching . '%' )
                ->orWHERE('created_at','like','%'.$searching.'%')->paginate (50);
     
// $pagination = $query->appends(array('searching'=> Input::get ( 'searching' )));
if (count ($query) > 0)
    return view ( 'user.index' )->withquery($query)->withq($searching);
}
    return view ( 'user.index' )->withMessage ( 'No Details found. Try to search again !' );
}

public function searchDate()
 { $searching = Input::get ('searchDatefrom');
    $search = Input::get ('searchDateto');
    if($searching != "")
    {
    $query=data::WHERE( 'created_at', '>=',$searching)->WHERE('created_at', '<=',$search)->paginate (10);
if (count ($query) > 0)
    return view ( 'user.index' )->withquery($query)->withq($searching);
}
    return view ( 'user.index' )->withMessage ( 'No Details found. Try to search again !' );
}


}