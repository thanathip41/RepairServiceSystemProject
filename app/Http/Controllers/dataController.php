<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data;
use Auth;
use PDF;
use DB;
use Illuminate\Support\Facades\Session;
class dataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showdata = data::paginate(10);  /// User = ตัวใน http/controller/_name file
        //$data = Data::all()->toArray(); 
        return view('user.index', compact('showdata')); 
        //  ชื่อ database :data แสดงข้อมูลใน database
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
        //อ้างอิงตำแหน่งของ view 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [ 'productCode' => 'required', 'problem' => 'required', 
        'name'=> 'null', 'type_id'=> 'null', 'repairman'=> 'null','statusCheck' => '1',
        'method' => 'null','remark'=> 'null']); 
        $input = new data(
            [ 'productCode' => $request->get('productCode'), 
              'problem' => $request->get('problem'),
              'name' =>Auth::user()->name, //seccion username to table data 
              'type_id'=>$request->get('typename'),
              'repairman'=>$request->get('repairman'),
              'method'=>$request->get('method'),
              'remark'=>$request->get('remark')
            ]);
         $input->save();
         return redirect('home')->with('success', 'บันทึกข้อมูลเรียบร้อย'); 
        //return redirect()->route('user.index')->with('success', 'บันทึกข้อมูลเรียบร้อย'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = data::find($id); 
	    return view('user.edit', compact('edit', 'id')); 
    }

    public function test($id)
    {   
        $test = data::find($id); 
	    return view('user.test', compact('test', 'id')); 
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function destroy($id)
    {
        $del = data::find($id); 
        $del->delete(); 
        return redirect()->route('user.index')->with('success', 'ลบข้อมูลเรียบร้อย');
    }
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
    public function history() {
        $history = data::all();  /// User = ตัวใน http/controller/_name file
        //$history = Data::paginate(10);
        return view('user.history', compact('history')); 

         /// User = ตัวใน http/controller/_name file
        //$data = Data::all()->toArray(); 
    }
}
