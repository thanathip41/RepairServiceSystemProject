<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data_repair;
use App\User;
use DB;

class AdminStatController extends Controller
{
    public function index()
    {
        
        $s1 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=1 and deleted=0'));
            //dd($s1);
        $s2 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=2 and deleted=0'));
        $s3 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=3 and deleted=0'));
        $s4 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=4 and deleted=0'));
        $s5 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=5 and deleted=0'));
        $s6 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=6 and deleted=0'));
        $s7 = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id=7 and deleted=0'));
        $sAll = DB::select( 
            DB::raw('select count(*) as number from data_repair where status_id and deleted=0'));
 $qq=DB::select( 
   DB::raw('select DATE_FORMAT(created_at , "%Y-%m")as date, device_id as type, deleted=0  as del,count(*) 
   as number from data_repair group by date,type,del'));
   //dd($qq);
                $id1m1 = DB::select( 
                    DB::raw('select count(*) as number from data_repair where device_id="1" and DATE_FORMAT(created_at , "%Y-%m")="2019-01" and deleted=0'));
                    $id1m2  = DB::select( 
                       DB::raw('select count(*) as number from data_repair where device_id="1" and DATE_FORMAT(created_at , "%Y-%m")="2019-02" and deleted=0'));               
                       $id1m3 = DB::select( 
                           DB::raw('select count(*) as number from data_repair where device_id="1" and DATE_FORMAT(created_at , "%Y-%m")="2019-03" and deleted=0'));
                           $id1m4 = DB::select( 
                               DB::raw('select count(*) as number from data_repair where device_id="1" and DATE_FORMAT(created_at , "%Y-%m")="2019-04" and deleted=0'));
                               $id1m5 = DB::select( 
                                   DB::raw('select count(*) as number from data_repair where device_id="1" and DATE_FORMAT(created_at , "%Y-%m")="2019-05" and deleted=0'));
                                   $id1m6 = DB::select( 
                                       DB::raw('select count(*) as number from data_repair where device_id="1" and DATE_FORMAT(created_at , "%Y-%m")="2019-06" and deleted=0'));
                                       $id1m7 = DB::select( 
                                           DB::raw('select count(*) as number from data_repair where device_id="1" and DATE_FORMAT(created_at , "%Y-%m")="2019-07" and deleted=0'));
                                           $id1m8 = DB::select( 
                                               DB::raw('select count(*) as number from data_repair where device_id="1" and DATE_FORMAT(created_at , "%Y-%m")="2019-08" and deleted=0'));
                                               $id1m9 = DB::select( 
                                                   DB::raw('select count(*) as number from data_repair where device_id="1" and DATE_FORMAT(created_at , "%Y-%m")="2019-9" and deleted=0'));
                                                   $id1m10 = DB::select( 
                                                       DB::raw('select count(*) as number from data_repair where device_id="1" and DATE_FORMAT(created_at , "%Y-%m")="2019-10" and deleted=0'));
                                                       $id1m11 = DB::select( 
                                                           DB::raw('select count(*) as number from data_repair where device_id="1" and DATE_FORMAT(created_at , "%Y-%m")="2019-11" and deleted=0'));
                                                           $id1m12 = DB::select( 
                                                               DB::raw('select count(*) as number from data_repair where device_id="1" and DATE_FORMAT(created_at , "%Y-%m")="2019-12" and deleted=0'));
                                                               $id1All = DB::select( 
                                                                DB::raw('select count(*) as number from data_repair where device_id="1" and deleted=0'));
$id2m1 = DB::select( 
 DB::raw('select count(*) as number from data_repair where device_id="2" and DATE_FORMAT(created_at , "%Y-%m")="2019-01" and deleted=0'));
 $id2m2  = DB::select( 
    DB::raw('select count(*) as number from data_repair where device_id="2" and DATE_FORMAT(created_at , "%Y-%m")="2019-02" and deleted=0'));               
    $id2m3 = DB::select( 
        DB::raw('select count(*) as number from data_repair where device_id="2" and DATE_FORMAT(created_at , "%Y-%m")="2019-03" and deleted=0'));
        $id2m4 = DB::select( 
            DB::raw('select count(*) as number from data_repair where device_id="2" and DATE_FORMAT(created_at , "%Y-%m")="2019-04" and deleted=0'));
            $id2m5 = DB::select( 
                DB::raw('select count(*) as number from data_repair where device_id="2" and DATE_FORMAT(created_at , "%Y-%m")="2019-05" and deleted=0'));
                $id2m6 = DB::select( 
                    DB::raw('select count(*) as number from data_repair where device_id="2" and DATE_FORMAT(created_at , "%Y-%m")="2019-06" and deleted=0'));
                    $id2m7 = DB::select( 
                        DB::raw('select count(*) as number from data_repair where device_id="2" and DATE_FORMAT(created_at , "%Y-%m")="2019-07" and deleted=0'));
                        $id2m8 = DB::select( 
                            DB::raw('select count(*) as number from data_repair where device_id="2" and DATE_FORMAT(created_at , "%Y-%m")="2019-08" and deleted=0'));
                            $id2m9 = DB::select( 
                                DB::raw('select count(*) as number from data_repair where device_id="2" and DATE_FORMAT(created_at , "%Y-%m")="2019-9" and deleted=0'));
                                $id2m10 = DB::select( 
                                    DB::raw('select count(*) as number from data_repair where device_id="2" and DATE_FORMAT(created_at , "%Y-%m")="2019-10" and deleted=0'));
                                    $id2m11 = DB::select( 
                                        DB::raw('select count(*) as number from data_repair where device_id="2" and DATE_FORMAT(created_at , "%Y-%m")="2019-11" and deleted=0'));
                                        $id2m12 = DB::select( 
                                            DB::raw('select count(*) as number from data_repair where device_id="2" and DATE_FORMAT(created_at , "%Y-%m")="2019-12" and deleted=0'));
                                            $id2All = DB::select( 
                                                DB::raw('select count(*) as number from data_repair where device_id=2  and deleted=0'));
$id3m1 = DB::select( 
 DB::raw('select count(*) as number from data_repair where device_id="3" and DATE_FORMAT(created_at , "%Y-%m")="2019-01" and deleted=0'));
 $id3m2  = DB::select( 
    DB::raw('select count(*) as number from data_repair where device_id="3" and DATE_FORMAT(created_at , "%Y-%m")="2019-02" and deleted=0'));               
    $id3m3 = DB::select( 
        DB::raw('select count(*) as number from data_repair where device_id="3" and DATE_FORMAT(created_at , "%Y-%m")="2019-03" and deleted=0'));
        $id3m4 = DB::select( 
            DB::raw('select count(*) as number from data_repair where device_id="3" and DATE_FORMAT(created_at , "%Y-%m")="2019-04" and deleted=0'));
            $id3m5 = DB::select( 
                DB::raw('select count(*) as number from data_repair where device_id="3" and DATE_FORMAT(created_at , "%Y-%m")="2019-05" and deleted=0'));
                $id3m6 = DB::select( 
                    DB::raw('select count(*) as number from data_repair where device_id="3" and DATE_FORMAT(created_at , "%Y-%m")="2019-06" and deleted=0'));
                    $id3m7 = DB::select( 
                        DB::raw('select count(*) as number from data_repair where device_id="3" and DATE_FORMAT(created_at , "%Y-%m")="2019-07" and deleted=0'));
                        $id3m8 = DB::select( 
                            DB::raw('select count(*) as number from data_repair where device_id="3" and DATE_FORMAT(created_at , "%Y-%m")="2019-08" and deleted=0'));
                            $id3m9 = DB::select( 
                                DB::raw('select count(*) as number from data_repair where device_id="3" and DATE_FORMAT(created_at , "%Y-%m")="2019-9" and deleted=0'));
                                $id3m10 = DB::select( 
                                    DB::raw('select count(*) as number from data_repair where device_id="3" and DATE_FORMAT(created_at , "%Y-%m")="2019-10" and deleted=0'));
                                    $id3m11 = DB::select( 
                                        DB::raw('select count(*) as number from data_repair where device_id="3" and DATE_FORMAT(created_at , "%Y-%m")="2019-11" and deleted=0'));
                                        $id3m12 = DB::select( 
                                            DB::raw('select count(*) as number from data_repair where device_id="3" and DATE_FORMAT(created_at , "%Y-%m")="2019-12" and deleted=0'));
                                            $id3All = DB::select( 
                                                DB::raw('select count(*) as number from data_repair where device_id=3 and deleted=0'));
                                                $idAll = DB::select( 
                                                    DB::raw('select count(*) as number from data_repair where device_id  and deleted=0'));


            return view('admin.stat', compact('qq','s1','s2','s3','s4','s5','s6','s7','sAll','idAll'
        ,'id1m1','id1m2','id1m3','id1m4','id1m5','id1m6','id1m7','id1m8','id1m9','id1m10','id1m11','id1m12','id1All'
        ,'id2m1','id2m2','id2m3','id2m4','id2m5','id2m6','id2m7','id2m8','id2m9','id2m10','id2m11','id2m12','id2All'
        ,'id3m1','id3m2','id3m3','id3m4','id3m5','id3m6','id3m7','id3m8','id3m9','id3m10','id3m11','id3m12','id3All'
        )); 
    }
}
