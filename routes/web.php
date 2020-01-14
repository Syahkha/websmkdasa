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
Route::get('set-akun','user\User@akun');
Route::post('set-akun-data','user\User@editA');

// user
Route::get('data-user','user\User@dataU');
Route::get('hapus-user/{id}','user\User@hapusU');
Route::post('tambah-user','user\User@tambahU');
Route::post('edit-user','user\User@editU');

// settingweb
Route::get('setweb','admin\SettingWebController@setweb');
Route::post('update-setting','admin\SettingWebController@upset');

// siswa
Route::get('input-siswa','admin\SiswaController@inputSiswa');
Route::get('data-siswa','admin\SiswaController@dataSiswa');
Route::get('data-siswi','admin\SiswaController@dataSiswi');

// ppdb
Route::get('daftar','admin\PpdbController@daftar');
Route::get('ppdb-siswa','admin\PpdbController@ppdbSiswa');
Route::get('ppdb-siswi','admin\PpdbController@ppdbSiswi');

// blog
Route::get('tulis','admin\BlogController@tulis');
Route::get('data-tulis','admin\BlogController@dataPenulisan');