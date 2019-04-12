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
        Route::resource('/user', 'dataController');
        Route::resource('/status', 'statusController');
        Route::resource('/chart', 'GraphController'); 
        Route::get('/Barchart', 'GraphController@Barchart'); 
        Route::get('/Piechart', 'GraphController@Piechart');
        Route::get('/downloadPDF/{id}', 'dataController@downloadPDF');
        Route::any('/searchID', 'dataController@searchID');
        Route::any('/searchCode', 'dataController@searchCode');
        Route::any('/searchDate', 'dataController@searchDate');
        Route::get('/mail', 'mailController@index');
        Route::post('/postMail', 'mailController@post');
        //Route::get('/sendmail', 'mailController@post');
    });
    Route::group(['middleware' =>'user'], function()
     {
        Route::get('/history', 'OnlyuserController@history');
        Route::resource('/statusUser', 'statusUserController');
        Route::get('/insert', 'OnlyuserController@create');
         Route::resource('/insertdata', 'OnlyuserController');
     });
     Route::resource('/profile', 'editProfileController');
    
});
