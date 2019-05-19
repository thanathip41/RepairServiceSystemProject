<?php

Route::any('/dashboard/chart/member', function () {
            $q = Input::get('q');
            if ($q != "") {
                $date = $q;
                // dd($date);
                $results = DB::select(DB::raw("SELECT SUM(fee) as sum FROM members WHERE DATE_FORMAT(created_at, '%Y')  = '$date' "));
                $results1 = DB::select(DB::raw("SELECT SUM(price) as sum FROM bikerentals WHERE DATE_FORMAT(created_at, '%Y')  = '$date' "));
                $results2 = DB::select(DB::raw("SELECT SUM(fine) as sum FROM bikereturns WHERE DATE_FORMAT(created_at, '%Y')  = '$date' "));
                //dd($results2[0]->sum);
                if ($results[0]->sum != null && $results1[0]->sum != null && $results2[0]->sum != null) {
                    $chart = Charts::create('pie', 'highcharts')
                        ->title(' Laravel Pie Chart')
                        ->labels(['Fee', 'price', 'fine'])
                        ->values([$results[0]->sum, $results1[0]->sum, $results2[0]->sum])
                        ->dimensions(1000, 500)
                        ->responsive(true);
                    return view('chart', compact('chart'));
                }
                if ($results[0]->sum == null && $results1[0]->sum != null && $results2[0]->sum != null) { 
                    $chart = Charts::create('pie', 'highcharts')
                        ->title(' Laravel Pie Chart')
                        ->labels(['price', 'fine'])
                        ->values([$results1[0]->sum, $results2[0]->sum])
                        ->dimensions(1000, 500)
                        ->responsive(true);               
                    return view('chart', compact('chart'));
                }
                if($results1[0]->sum == null && $results[0]->sum != null && $results2[0]->sum != null) { 
                    $chart = Charts::create('pie', 'highcharts')
                        ->title(' Laravel Pie Chart')
                        ->labels(['Fee', 'fine'])
                        ->values([$results[0]->sum,$results2[0]->sum])
                        ->dimensions(1000, 500)
                        ->responsive(true);               
                    return view('chart', compact('chart'));
                }
                if ($results2[0]->sum == null && $results[0]->sum != null && $results1[0]->sum != null) {
                    $chart = Charts::create('pie', 'highcharts')
                        ->title(' Laravel Pie Chart')
                        ->labels(['Fee', 'price'])
                        ->values([$results[0]->sum, $results1[0]->sum])
                        ->dimensions(1000, 500)
                        ->responsive(true);
                    return view('chart', compact('chart'));
                }
               if($results[0]->sum == null && $results1[0]->sum == null && $results2[0]->sum == null)
               return view('chart',['message'=>'ไม่พบข้อมูล, ลองค้นหาอีกครั้ง !']);  
            }
            return view('chart',['message'=>'ไม่พบข้อมูล, ลองค้นหาอีกครั้ง !']);
        });


        