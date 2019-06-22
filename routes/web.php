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
use App\data_repair;
use Illuminate\Support\Facades\Input;
Auth::routes();
    Route::group(['middleware' =>['ban','auth']], function(){   //['ban','auth']]
     Route::get('/',function () 
    {
         $id=Auth::user()->id;
         $s3 = DB::select( 
        DB::raw("select count(*) as number from data_repair where status_id=3 and idM='$id' and deleted=0"));
        $noti = data_repair::WHERE('idM','=',$id)->WHERE('deleted','=',0)->WHERE('status_id','=',3)->paginate(10);
        $notihistory = data_repair::WHERE('idM','=',$id)->WHERE('deleted','=',0)->paginate(30);
       return view('homepage.welcome', compact('s3','noti','notihistory'));
   });

    Route::group(['middleware' =>'admin'], function()
    {
        Route::resource('/Role', 'AdminRoleController');
        Route::resource('/Check', 'AdminDataRepairController');
        Route::resource('/deleted', 'AdminDelUserController');
        Route::get('/processAdmin/{id}', 'AdminDataRepairController@process');
        Route::get('/pdf/{id}', 'AdminDataRepairController@PDF');
        Route::get('/restoreUser', 'AdminRoleController@restoreUser');
        Route::get('/restoreData', 'AdminDataRepairController@restoreData');
        Route::get('/Piechart', 'AdminGraphController@Piechart'); 
        Route::resource('/stat', 'AdminStatController');

        Route::any('/sName', 'AdminDataRepairController@searchName');
        Route::any('/sCode', 'AdminDataRepairController@searchCode');
        Route::any('/sDateBetween', 'AdminDataRepairController@searchDateBetween');
        Route::any('/sDate', 'AdminDataRepairController@searchDate');
    });

    Route::group(['middleware' =>'maintenance'], function()
    {   
        Route::resource('/datarepair', 'MainDataRepairController');
          Route::get('/formpdf/{id}', 'MainDataRepairController@PDF');
          Route::any('/searchName', 'MainDataRepairController@searchName');
          Route::any('/searchStatus', 'MainDataRepairController@searchStatus');
          Route::any('/searchCode', 'MainDataRepairController@searchCode');
          Route::any('/searchDateBetween', 'MainDataRepairController@searchDateBetween');
          Route::any('/searchDate', 'MainDataRepairController@searchDate');
        Route::resource('/status', 'MainStatusRepairController');
          Route::get('/process/{id}', 'MainStatusRepairController@process');
        Route::get('/mail', 'MainMailController@index');
          Route::post('/postMail', 'MainMailController@post');
      
       
      
    });
    Route::group(['middleware' =>'user'], function()
     {
        Route::get('/history', 'UserInsertRepairController@history');
        Route::get('/accept', 'UserInsertRepairController@accept');
        Route::resource('/statusUser', 'UserRepairVerifyController');
        Route::get('/insert', 'UserInsertRepairController@index');
        Route::resource('/insertdata', 'UserInsertRepairController');
        Route::get('/processUser/{id}', 'UserInsertRepairController@process');
        Route::get('/img', 'UserInsertRepairController@img');     
        Route::get('/bot', 'UserInsertRepairController@bot');


        
     });
     
     Route::resource('/profile', 'editProfileController');
});
