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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'Auth\LoginController@showlogin');

Route::get('reguser', 'Auth\LoginController@showregusuario')->name('vistareguser');

Route::get('home', 'HomeController@index')->name('home2');

Route::get('home/transferencia', 'HomeController@transferencia')->name('transferencia');
Route::get('home/credito', 'HomeController@credito')->name('credito');
Route::get('home/debito', 'HomeController@debito')->name('debito');
Route::get('home', 'HomeController@saldo')->name('home');

Route::post('login','Auth\LoginController@login')->name('login');
Route::post('logout','Auth\LoginController@logout')->name('logout');
Route::post('reguser','Auth\LoginController@registrarUsuario')->name('reguser');

Route::post('home/credito', 'HomeController@regCredito')->name('regCredito');
Route::post('home/debito', 'HomeController@regDevito')->name('regDevito');
Route::post('home/transferencia', 'HomeController@regTransferencia')->name('regTransferencia');
