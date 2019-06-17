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

Route::get('qrcode', 'QrcodeController@index')->name('qrcode.index');
Route::get('qrcode/create', 'QrcodeController@create')->name('qrcode.create');
Route::post('qrcode', 'QrcodeController@store')->name('qrcode.store');
Route::get('qrcode/{id}/edit', 'QrcodeController@edit')->name('qrcode.edit');
Route::match(['put', 'patch'],'qrcode/{id}', 'QrcodeController@update')->name('qrcode.update');
Route::delete('qrcode/{id}', 'QrcodeController@destroy')->name('qrcode.destroy');

Route::get('fileReference', 'FileReferenceController@index')->name('fileReference.index');
Route::post('fileReference', 'FileReferenceController@store')->name('fileReference.store');
Route::get('fileReference/{id}/edit', 'FileReferenceController@edit')->name('fileReference.edit');
Route::match(['put', 'patch'],'fileReference/{id}', 'FileReferenceController@update')->name('fileReference.update');
Route::delete('fileReference/{id}', 'FileReferenceController@destroy')->name('fileReference.destroy');


Route::post('qrcodeFileReference', 'QrcodeFileReferenceController@store')->name('qrcodeFileReference.store');
Route::get('qrcodeFileReference/{id}/edit', 'QrcodeFileReferenceController@edit')->name('qrcodeFileReference.edit');
Route::delete('qrcodeFileReference/{id}', 'QrcodeFileReferenceController@destroy')->name('qrcodeFileReference.destroy');

Route::get('fileStorage', 'FileStorageController@index')->name('fileStorage.index');

Route::post('upload', 'FileStorageController@upload')->name('upload');

Route::get('download/{id}', 'FileStorageController@download')->name('download');
