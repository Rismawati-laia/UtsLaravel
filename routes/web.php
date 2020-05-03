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
    return view('welcome');
});
Route::get('/data','BiodataController@index');

Route::get('/data/tambah','BiodataController@tambah');

Route::post('/data/store','BiodataController@store');

Route::get('/data/edit/{id}','BiodataController@edit');

Route::post('/data/update','BiodataController@update');

Route::get('/data/hapus/{id}','BiodataController@hapus');