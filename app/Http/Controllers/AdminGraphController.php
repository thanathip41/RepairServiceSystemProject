<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data_repair;
use App\users;
use DB;

class AdminGraphController extends Controller
{
    function Piechart()
    {
      $problemAll = DB::select( 
        DB::raw('select count(*) as number from data_repair  problem '));  
        //dd($problemAll);
      $input = DB::table('data_repair')
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
        return view('admin.Piechart',compact('problemAll'))->with('problem', json_encode($array));
        }
}
