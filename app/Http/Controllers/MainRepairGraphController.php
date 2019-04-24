<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data;
use App\users;
use DB;

class MainRepairGraphController extends Controller
{
    function Barchart()
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
     return view('maintenance.Barchart')->with('type_id', json_encode($array));
    }

    function Piechart()
    {
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
     return view('maintenance.Piechart')->with('problem', json_encode($array));
    }


    
    
}
