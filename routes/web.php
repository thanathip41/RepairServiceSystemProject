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

Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' =>['auth']], function(){
   Route::get('/',function (){
       return view('welcome');
   });
    Route::get('/home',function(){
         if (Auth::user()->admin==0){
        $users['data']=\App\Data::all();
       // $users['data']=\App\Data::all(Auth::user()->username);
      //  $users->Auth::user()->username;
        return view('home',$users);
    }
    else{
        $users['users']=\App\User::all();
        return view('adminhome',$users);
    }
    });
    Route::resource('/user', 'dataController'); //resource เรียกจาก path user ใน view
    Route::resource('/test', 'status2Controller');
    //Route::get('update/{id}', 'status2Controller@update');
    Route::get('/search', 'SearchController@search')->name('user.search');  
    Route::get('/action', 'SearchController@action')->name('user.action');
    //Route::get('test/{id}', 'status2Controller@edit');
   
    Route::get('/downloadPDF/{id}', 'dataController@downloadPDF');
    Route::get('/history', 'dataController@history'); 
    Route::get('/charttype', 'GraphController@index'); 
    Route::get('/chartproblem', 'GraphController@show');   
     });