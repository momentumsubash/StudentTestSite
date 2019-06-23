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

//Route::get('/', function () {
//    return view('home');
//}




Route::get('/', 'ApplicationController@index');



Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin');
Route::post('/testimonials','ApplicationController@testimonials')->name('testimonials');
Route::any('/imgupload','HomeController@uploadimg')->name('imgupload');
Route::post('/updateimg', 'HomeController@imageuplaod')->name('updateimg');


