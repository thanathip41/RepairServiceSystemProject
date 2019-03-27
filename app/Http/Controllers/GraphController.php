<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GraphController extends Controller
{
    function index()
    {
     $data = DB::table('data')
       ->select(
        DB::raw('type_id as type_id'),
        DB::raw('count(*) as number'))
       ->groupBy('type_id')
       ->get();
     $array[] = ['type_id', 'Number'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->type_id, $value->number];
     }
     return view('user.charttype')->with('type_id', json_encode($array));
    }
    function show()
    {
     $data = DB::table('data')
       ->select(
        DB::raw('problem as problem'),
        DB::raw('count(*) as number'))
       ->groupBy('problem')
       ->get();
     $array[] = ['problem', 'Number'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->problem, $value->number];
     }
     return view('user.chartproblem')->with('problem', json_encode($array));
    }
}
