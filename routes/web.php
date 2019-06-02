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
use Illuminate\Support\Facades\Input;
Auth::routes();
    Route::group(['middleware' =>['auth']], function(){   //['ban','auth']]
     Route::get('/',function () 
     {
      if(Auth::user()->activated==1){
        
        $s1 = DB::select( 
         DB::raw('select count(*) as number from data_repair where statusCheck=1 and deleted=0'));
         $id=Auth::user()->id;
         $s3 = DB::select( 
        DB::raw("select count(*) as number from data_repair where statusCheck=3 and idM='$id' and deleted=0"));
       return view('homepage.welcome', compact('s1','s3'));
      }
      elseif (Auth::user()->activated==0 )
      return view('errors.login');
   });

    Route::group(['middleware' =>'admin'], function()
    {
        Route::resource('/Role', 'AdminRoleController');
        Route::resource('/Check', 'AdminDataRepairController');
        Route::resource('/deleted', 'AdminDelUserController');
        Route::get('/processAdmin/{id}', 'AdminDataRepairController@process');
        Route::get('/restoreUser', 'AdminRoleController@restoreUser');
        Route::get('/restoreData', 'AdminDataRepairController@restoreData');
        Route::get('/Piechart', 'AdminGraphController@Piechart'); 
        Route::resource('/stat', 'AdminStatController');
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
        
        //Route::get('/Piechart', 'MainRepairGraphController@Piechart'); 
        Route::get('/mail', 'MainMailController@index');
          Route::post('/postMail', 'MainMailController@post');
        //  Route::post('/postMailCC', 'MainMailController@postCC');
        //Route::resource('/stat', 'MainStatController');
       
      
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

        
     });
     Route::resource('/profile', 'editProfileController');
    
});
