<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data;
use App\users;
use DB;

class MainRepairGraphController extends Controller
{
  public function index()
  {
     
    $t1 = DB::select( 
      DB::raw('select count(*) as number from data where type_id="คอมพิวเตอร์"'));
      $t2 = DB::select( 
        DB::raw('select count(*) as number from data where type_id="โน๊ตบุ๊ค"'));
        $t3 = DB::select( 
          DB::raw('select count(*) as number from data where type_id="เครื่องปริ้นซ์"'));
          $t4 = DB::select( 
            DB::raw('select count(*) as number from data where type_id="ระบบเครือข่าย"'));
      
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
         
    return view('maintenance.testindex', compact('t1','t2','t3','t4','s1','s2','s3','s4','s5','s6')); 
  }

    function Piechart()
    {
     $input = DB::table('data')
       ->select(
        DB::raw('type_id as type_id'),
        DB::raw('count(*) as number'))
       ->groupBy('type_id')
       ->get();
     $array[] = ['type_id', 'Number'];
     foreach($input as $key => $value)
     {
      $array[++$key] = [$value->type_id, $value->number];
     }
    // dd($array);
     return view('maintenance.Piechart')->with('type_id', json_encode($array));
    }


    
    
}
