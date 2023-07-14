<?php

use Illuminate\Support\Facades\Route;

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
    // return view('welcome');
  
});

Route::get('/user','UsercontentController@index')->name('user.index');
Route::get('/user-tambah','UsercontentController@create')->name('user.tambah');
Route::post('/simpan-user','UsercontentController@store')->name('user.simpan');
Route::delete('/hapus-user/{id}','UsercontentController@hapus')->name('user.hapus');
Route::get('/edit-user/{id}','UsercontentController@edit')->name('user.edit');
Route::post('/update-user/{id}','UsercontentController@update')->name('user.update');

