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

Route::get('fevercheck', 'FeverCheckController@index')->name("fevercheck");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('image-upload', 'InputController@imageUploadPost')->name('image.upload.post');
Route::get('readTextFromJsonData', 'InputController@readTextFromJsonData')->name('read.text.from.json');
Route::get('report-input', 'InputController@index');
Route::get('report-list', 'InputController@list');