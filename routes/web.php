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

// setting user
Route::get('setting_user','user\User@user');

// settingweb
Route::get('setweb','admin\SettingWebController@setweb');

// siswa
Route::get('siswa','siswaController@siswa');
