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
       return view('welcome');
     });

    Route::get('/home',function()
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
    });
    Route::group(['middleware' =>'admin'], function()
    {
        Route::resource('/Role', 'AdminRoleController');
        Route::resource('/Check', 'AdminController');
        
    });

    Route::group(['middleware' =>'maintenance'], function()
    {   
        Route::resource('/datarepair', 'MainDataRepairController');
        Route::resource('/status', 'MainStatusRepairController');
        Route::get('/Barchart', 'MainRepairGraphController@Barchart'); 
        Route::get('/Piechart', 'MainRepairGraphController@Piechart');
        Route::get('/downloadPDF/{id}', 'MainDataRepairController@downloadPDF');
        Route::any('/searchID', 'MainDataRepairController@searchID');
        Route::any('/searchCode', 'MainDataRepairController@searchCode');
        Route::any('/searchDateBetween', 'MainDataRepairController@searchDateBetween');
        Route::any('/searchDate', 'MainDataRepairController@searchDate');
        Route::get('/mail', 'MainMailController@index');
        Route::post('/postMail', 'MainMailController@post');
        Route::post('/postMailCC', 'MainMailController@postCC');
    });
    Route::group(['middleware' =>'user'], function()
     {
        Route::get('/history', 'UserInsertRepairController@history');
        Route::resource('/statusUser', 'UserRepairVerifyController');
        Route::get('/insert', 'UserInsertRepairController@create');
         Route::resource('/insertdata', 'UserInsertRepairController');
     });
     Route::resource('/profile', 'editProfileController');
    
});
