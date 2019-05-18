<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data;
use App\users;
use DB;

class MainRepairGraphController extends Controller
{
    function Piechart()
    {
        // $s1 = DB::select( 
        //     DB::raw('select count(*) as number from data where statusCheck=1 and deleted=0'));
        //     //dd($s1);
        // $s2 = DB::select( 
        //     DB::raw('select count(*) as number from data where statusCheck=2 and deleted=0'));
        // $s3 = DB::select( 
        //     DB::raw('select count(*) as number from data where statusCheck=3 and deleted=0'));
        // $s4 = DB::select( 
        //     DB::raw('select count(*) as number from data where statusCheck=4 and deleted=0'));
        // $s5 = DB::select( 
        //     DB::raw('select count(*) as number from data where statusCheck=5 and deleted=0'));
        // $s6 = DB::select( 
        //     DB::raw('select count(*) as number from data where statusCheck=6 and deleted=0'));
        // $s7 = DB::select( 
        //     DB::raw('select count(*) as number from data where statusCheck=7 and deleted=0'));
        // $sAll = DB::select( 
        //     DB::raw('select count(*) as number from data where statusCheck and deleted=0'));

     $input = DB::table('data')
       ->select(
        DB::raw('problem as problem'),
        DB::raw('count(*) as number'))
       ->groupBy('problem')
       ->get();
     $array[] = ['problem', 'Number'];
     foreach($input as $key => $value)
     {
      $array[++$key] = [$value->problem, $value->number];
     }
    // dd($array);
     return view('maintenance.Piechart')->with('problem', json_encode($array));
    }


    
    
}
