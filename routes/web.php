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

Route::get('/', 'IndexController@index');

Route::get('/daftar', 'DaftarController@index');
Route::post('/daftar', 'DaftarController@save');

Route::get('/masuk', 'MasukController@index')->middleware('guest');
Route::post('/masuk', 'MasukController@post');

Route::get('/keluar', 'MasukController@keluar');

Route::get('/beranda', 'BerandaController@index');

Route::get('/ganti-password', 'ProfilController@gantiPassword');
Route::post('/ganti-password', 'ProfilController@simpanGantiPassword');
Route::get('/profilku', 'ProfilController@profilku');
Route::post('/profilku', 'ProfilController@simpanProfilku');

Route::group(['prefix' => 'hafalan', 'middleware' => ['auth']], function() {
    Route::any('/', 'HafalanController@index');
    Route::get('tambah', 'HafalanController@tambah');
    Route::get('ubah/{id}', 'HafalanController@ubah');
    Route::post('get-ayat-surat', 'HafalanController@getAyatSurat');
    Route::post('simpan', 'HafalanController@simpan');
    Route::post('hapus', 'HafalanController@hapus');
});