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

Route::get('/', function () {
    return view('welcome');
});

// Route::group(['middleware'=>'App\Http\Middleware\AdminMiddleware'],function(){
// 	Route::post('/saveNewTask', 'TaskController@saveNewTask');

// 	Route::get('/deleteTask/{id}', 'TaskController@deleteTask');	
// });


Route::get('/','TaskController@showTasks');

Route::post('/saveNewTask','TaskController@saveNewTask');

Route::get('/deleteTask/{id}','TaskController@deleteTask');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
