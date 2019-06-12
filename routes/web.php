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

Route::get('qrcode', 'QrcodeController@index');

Route::get('qrcode/new', 'QrcodeController@create');

Route::get('qrcode/edit/{id}', 'QrcodeController@edit');

Route::get('qrcode/show/{id}', 'QrcodeController@show');

Route::post('qrcode/store', 'QrcodeController@store');

Route::put('qrcode/update', 'QrcodeController@store');

Route::delete('qrcode/destroy', 'QrcodeController@destroy');
