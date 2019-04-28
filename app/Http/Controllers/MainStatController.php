<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data;
use App\User;
use DB;

class MainStatController extends Controller
{
    public function index()
    {
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
        $sAll = DB::select( 
            DB::raw('select count(*) as number from data where statusCheck'));
 $qq=DB::select( 
   DB::raw('select DATE_FORMAT(created_at , "%Y-%m")as date, type_id as type, count(*) as number from data group by date,type'));
                $id1m1 = DB::select( 
                    DB::raw('select count(*) as number from data where type_id="1" and DATE_FORMAT(created_at , "%Y-%m")="2019-01"'));
                    $id1m2  = DB::select( 
                       DB::raw('select count(*) as number from data where type_id="1" and DATE_FORMAT(created_at , "%Y-%m")="2019-02"'));               
                       $id1m3 = DB::select( 
                           DB::raw('select count(*) as number from data where type_id="1" and DATE_FORMAT(created_at , "%Y-%m")="2019-03"'));
                           $id1m4 = DB::select( 
                               DB::raw('select count(*) as number from data where type_id="1" and DATE_FORMAT(created_at , "%Y-%m")="2019-04"'));
                               $id1m5 = DB::select( 
                                   DB::raw('select count(*) as number from data where type_id="1" and DATE_FORMAT(created_at , "%Y-%m")="2019-05"'));
                                   $id1m6 = DB::select( 
                                       DB::raw('select count(*) as number from data where type_id="1" and DATE_FORMAT(created_at , "%Y-%m")="2019-06"'));
                                       $id1m7 = DB::select( 
                                           DB::raw('select count(*) as number from data where type_id="1" and DATE_FORMAT(created_at , "%Y-%m")="2019-07"'));
                                           $id1m8 = DB::select( 
                                               DB::raw('select count(*) as number from data where type_id="1" and DATE_FORMAT(created_at , "%Y-%m")="2019-08"'));
                                               $id1m9 = DB::select( 
                                                   DB::raw('select count(*) as number from data where type_id="1" and DATE_FORMAT(created_at , "%Y-%m")="2019-9"'));
                                                   $id1m10 = DB::select( 
                                                       DB::raw('select count(*) as number from data where type_id="1" and DATE_FORMAT(created_at , "%Y-%m")="2019-10"'));
                                                       $id1m11 = DB::select( 
                                                           DB::raw('select count(*) as number from data where type_id="1" and DATE_FORMAT(created_at , "%Y-%m")="2019-11"'));
                                                           $id1m12 = DB::select( 
                                                               DB::raw('select count(*) as number from data where type_id="1" and DATE_FORMAT(created_at , "%Y-%m")="2019-12"'));
$id2m1 = DB::select( 
 DB::raw('select count(*) as number from data where type_id="2" and DATE_FORMAT(created_at , "%Y-%m")="2019-01"'));
 $id2m2  = DB::select( 
    DB::raw('select count(*) as number from data where type_id="2" and DATE_FORMAT(created_at , "%Y-%m")="2019-02"'));               
    $id2m3 = DB::select( 
        DB::raw('select count(*) as number from data where type_id="2" and DATE_FORMAT(created_at , "%Y-%m")="2019-03"'));
        $id2m4 = DB::select( 
            DB::raw('select count(*) as number from data where type_id="2" and DATE_FORMAT(created_at , "%Y-%m")="2019-04"'));
            $id2m5 = DB::select( 
                DB::raw('select count(*) as number from data where type_id="2" and DATE_FORMAT(created_at , "%Y-%m")="2019-05"'));
                $id2m6 = DB::select( 
                    DB::raw('select count(*) as number from data where type_id="2" and DATE_FORMAT(created_at , "%Y-%m")="2019-06"'));
                    $id2m7 = DB::select( 
                        DB::raw('select count(*) as number from data where type_id="2" and DATE_FORMAT(created_at , "%Y-%m")="2019-07"'));
                        $id2m8 = DB::select( 
                            DB::raw('select count(*) as number from data where type_id="2" and DATE_FORMAT(created_at , "%Y-%m")="2019-08"'));
                            $id2m9 = DB::select( 
                                DB::raw('select count(*) as number from data where type_id="2" and DATE_FORMAT(created_at , "%Y-%m")="2019-9"'));
                                $id2m10 = DB::select( 
                                    DB::raw('select count(*) as number from data where type_id="2" and DATE_FORMAT(created_at , "%Y-%m")="2019-10"'));
                                    $id2m11 = DB::select( 
                                        DB::raw('select count(*) as number from data where type_id="2" and DATE_FORMAT(created_at , "%Y-%m")="2019-11"'));
                                        $id2m12 = DB::select( 
                                            DB::raw('select count(*) as number from data where type_id="2" and DATE_FORMAT(created_at , "%Y-%m")="2019-12"'));
$id3m1 = DB::select( 
 DB::raw('select count(*) as number from data where type_id="3" and DATE_FORMAT(created_at , "%Y-%m")="2019-01"'));
 $id3m2  = DB::select( 
    DB::raw('select count(*) as number from data where type_id="3" and DATE_FORMAT(created_at , "%Y-%m")="2019-02"'));               
    $id3m3 = DB::select( 
        DB::raw('select count(*) as number from data where type_id="3" and DATE_FORMAT(created_at , "%Y-%m")="2019-03"'));
        $id3m4 = DB::select( 
            DB::raw('select count(*) as number from data where type_id="3" and DATE_FORMAT(created_at , "%Y-%m")="2019-04"'));
            $id3m5 = DB::select( 
                DB::raw('select count(*) as number from data where type_id="3" and DATE_FORMAT(created_at , "%Y-%m")="2019-05"'));
                $id3m6 = DB::select( 
                    DB::raw('select count(*) as number from data where type_id="3" and DATE_FORMAT(created_at , "%Y-%m")="2019-06"'));
                    $id3m7 = DB::select( 
                        DB::raw('select count(*) as number from data where type_id="3" and DATE_FORMAT(created_at , "%Y-%m")="2019-07"'));
                        $id3m8 = DB::select( 
                            DB::raw('select count(*) as number from data where type_id="3" and DATE_FORMAT(created_at , "%Y-%m")="2019-08"'));
                            $id3m9 = DB::select( 
                                DB::raw('select count(*) as number from data where type_id="3" and DATE_FORMAT(created_at , "%Y-%m")="2019-9"'));
                                $id3m10 = DB::select( 
                                    DB::raw('select count(*) as number from data where type_id="3" and DATE_FORMAT(created_at , "%Y-%m")="2019-10"'));
                                    $id3m11 = DB::select( 
                                        DB::raw('select count(*) as number from data where type_id="3" and DATE_FORMAT(created_at , "%Y-%m")="2019-11"'));
                                        $id3m12 = DB::select( 
                                            DB::raw('select count(*) as number from data where type_id="3" and DATE_FORMAT(created_at , "%Y-%m")="2019-12"'));

            return view('maintenance.stat', compact('qq','s1','s2','s3','s4','s5','s6','sAll'
        ,'id1m1','id1m2','id1m3','id1m4','id1m5','id1m6','id1m7','id1m8','id1m9','id1m10','id1m11','id1m12'
        ,'id2m1','id2m2','id2m3','id2m4','id2m5','id2m6','id2m7','id2m8','id2m9','id2m10','id2m11','id2m12'
        ,'id3m1','id3m2','id3m3','id3m4','id3m5','id3m6','id3m7','id3m8','id3m9','id3m10','id3m11','id3m12'
        )); 
    }
}
