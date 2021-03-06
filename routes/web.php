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

// Route::get('/', function () {
//     return view('welcome');
// });

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
Route::post('update-setting','admin\SettingWebController@updateSetting');
Route::post('insert-setweb','admin\SettingWebController@inputSetweb');

// data siswa/siswi
// =======================================================
// siswa
Route::get('data-siswa','admin\SiswaController@dataSiswa');
Route::post('update-siswa','admin\SiswaController@updateSiswa');
Route::get('hapus-siswa/{id}/{idortu}','admin\SiswaController@hapusSiswa');
// siswi
Route::get('data-siswi','admin\SiswaController@dataSiswi');
Route::post('update-siswi','admin\SiswaController@updateSiswi');
Route::get('hapus-siswi/{id}/{idortu}','admin\SiswaController@hapusSiswi');
// =======================================================

// ppdb
Route::get('daftar','admin\PpdbController@daftar');
Route::post('simpan-daftar','admin\PpdbController@simpanD');
Route::get('print-ppdb/{id}','admin\PpdbController@print');
// =======================================================
// siswa
Route::get('ppdb-siswa','admin\PpdbController@ppdbSiswa');
Route::get('acc-daftar-sa/{id}','admin\PpdbController@accSiswa');
Route::post('ditolak-daftar-sa','admin\PpdbController@ditolakSiswa');
// siswi
Route::get('ppdb-siswi','admin\PpdbController@ppdbSiswi');
Route::get('acc-daftar-si/{id}','admin\PpdbController@accSiswi');
Route::post('ditolak-daftar-si','admin\PpdbController@ditolakSiswi');
// =======================================================

// blog
Route::get('tulis','admin\BlogController@tulis');
Route::post('input-kategori','admin\BlogController@inputKategori');
Route::post('update-kategori','admin\BlogController@updateKategori');
Route::get('hapus-kategori/{id}','admin\BlogController@hapusK');
Route::post('post-artikel','admin\BlogController@inputArtikel');
Route::get('data-tulis','admin\BlogController@dataPenulisan');
Route::get('lock-artikel/{id}/{y}','admin\BlogController@lockA');
Route::post('update-artikel','admin\BlogController@updateArtikel');
Route::get('hapus-artikel/{id}','admin\BlogController@hapusA');
Route::post('cari-artikel','admin\BlogController@cari');
Route::post('sub-kategori','admin\BlogController@subKategori');
Route::post('update-sub','admin\BlogController@upSK');
Route::get('hapus-Skategori/{id}','admin\BlogController@hapusSK');
Route::get('/cariartikel','user\frontendcontroller@cariartikel');

// tahun
Route::get('tahun','admin\tahunController@tahun');

//front
Route::get('/','user\frontendcontroller@index');
Route::get('tampilblog','user\frontendcontroller@blog');

//excel 
Route::get('download-excelsiswa','user\user@dexcelsiswa');
Route::get('detailartikel/{judul}','user\frontendcontroller@detail_artikel');
