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
Route::get('/input', function () {
    return view('input.index');
});

Route::get('/fevercheck', function () {
    return view('fevercheck.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
