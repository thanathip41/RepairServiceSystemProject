<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\User;
use App\data;
use Illuminate\Support\Facades\Input;
Auth::routes();
   Route::group(['middleware' =>['auth']], function(){
   Route::get('/',function ()
     {
       $data =data::all('id');
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
       return view('homepage.welcome', compact('data','s1','s2','s3','s5','s6','sAll'));
     });

    /*Route::get('/home',function()
    {
         if (Auth::user()->roleCheck==0)
        {
        $users['data']=\App\Data::all();
        return view('userhome',$users);   
        }
        elseif (Auth::user()->roleCheck==1)
        {
        $users['users']=\App\User::all();
        return view('maintenancehome',$users);
        }
        elseif (Auth::user()->roleCheck==2)
        {
        $users['users']=\App\User::all();
        return view('adminhome',$users);
        }
    });*/
    Route::group(['middleware' =>'admin'], function()
    {
        Route::resource('/Role', 'AdminRoleController');
        Route::resource('/Check', 'AdminController');
 
    });

    Route::group(['middleware' =>'maintenance'], function()
    {   
        Route::resource('/datarepair', 'MainDataRepairController');
        Route::resource('/status', 'MainStatusRepairController');
        Route::get('/finally', 'MainRepairGraphController@index'); 
        Route::get('/Piechart', 'MainRepairGraphController@Piechart'); 
        Route::get('/formpdf/{id}', 'MainDataRepairController@PDF');
        Route::any('/searchID', 'MainDataRepairController@searchID');
        Route::any('/searchCode', 'MainDataRepairController@searchCode');
        Route::any('/searchDateBetween', 'MainDataRepairController@searchDateBetween');
        Route::any('/searchDate', 'MainDataRepairController@searchDate');
        Route::get('/mail', 'MainMailController@index');
        Route::post('/postMail', 'MainMailController@post');
        Route::post('/postMailCC', 'MainMailController@postCC');
        Route::get('/alert', 'MainDataRepairController@alert');
        Route::resource('/stat', 'MainStatController');
  
    });
    Route::group(['middleware' =>'user'], function()
     {
        Route::get('/history', 'UserInsertRepairController@history');
        Route::get('/alertUser', 'UserInsertRepairController@alertUser');
        Route::resource('/statusUser', 'UserRepairVerifyController');
        Route::get('/insert', 'UserInsertRepairController@create');
        Route::resource('/insertdata', 'UserInsertRepairController');
     });
     Route::resource('/profile', 'editProfileController');
    
});
