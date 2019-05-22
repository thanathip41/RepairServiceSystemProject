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
      $problemAll = DB::select( 
        DB::raw('select count(*) as number from data problem'));  
        //dd($problemAll);
      $input = DB::table('data')
          ->select(
            DB::raw('problem as problem'),
            DB::raw('count(*) as number'))
          ->groupBy('problem')
          ->get();
         // dd($input);
        $array[] = ['problem', 'Number'];
        foreach($input as $key => $value)
        {
          $array[++$key] = [$value->problem, $value->number];
        }
        // dd($array);
        return view('maintenance.Piechart',compact('problemAll'))->with('problem', json_encode($array));
        }
}
