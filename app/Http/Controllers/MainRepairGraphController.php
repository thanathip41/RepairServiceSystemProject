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
