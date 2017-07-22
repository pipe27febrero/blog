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

Route::get('/', 'HomeController@index')->name('home');
Route::get('destroy/{id_cuenta}', 'HomeController@destroy')->name('destroy');
Route::get('modificar/{id_cuenta}','HomeController@modificar')->name('modificar');
Route::get('agregar','HomeController@agregar')->name('agregar');
Route::get('agregarmaestra','HomeController@agregarMaestra')->name('agregarmaestra');
Route::get('update/{id_cuenta}','HomeController@update')->name('update');
Route::resource('universal', 'UniversalController');
Route::post('addmaestra','UniversalController@storeMaestra')->name('addmaestra');
Route::get('pdf', 'HomeController@pdf')->name('pdf');