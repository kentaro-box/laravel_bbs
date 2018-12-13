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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});

Route::get('post','BbsController@post');

Route::post('store','BbsController@store');

Route::get('/delete/{id}','BbsController@delete')->name('delete');

Route::get('/preview/{post}','BbsController@preview')->name('preview');
Route::post('/update/{id}','BbsController@update')->name('update');