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

Route::resource('qrcode', 'QrcodeController');

Route::resource('fileReference', 'FileReferenceController');

// Route::resource('fileStorage', 'FileStorageController');
Route::get('fileStorage', 'FileStorageController@index')->name('index');

Route::post('upload', 'FileStorageController@upload')->name('upload');

Route::get('download/{id}', 'FileStorageController@download')->name('download');

Route::get('rollback', 'FileStorageController@rollback')->name('rollback');

Route::get('done', 'FileStorageController@done')->name('done');
