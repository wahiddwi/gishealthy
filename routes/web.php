<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('wilayah', 'WilayahController@index')->name('wilayah');
Route::get('kecamatan', 'KecamatanController@index')->name('kecamatan');
Route::get('kelurahan', 'KelurahanController@index')->name('kelurahan');
////Admin/////////////////////////
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('user', 'UserController');
    Route::resource('post', 'PostController');
    Route::resource('wilayah', 'WilayahController');
    Route::get('kecamatan/download', 'KecamatanController@downloadPDF')->name('download-kecamatan');
    Route::resource('kecamatan', 'KecamatanController');
    Route::resource('laykes', 'LaykesController');
    Route::resource('kelurahan', 'KelurahanController');
    Route::get('tenagamedis/wilayah', 'TenagamedisController@gettenagamediskota')->name('tenagamedis-kota');
    Route::get('tenagamedis/kecamatan', 'TenagamedisController@gettenagamediskecamatan')->name('tenagamedis-kecamatan');
    Route::get('tenagamedis/kelurahan', 'TenagamedisController@getmediskelurahan')->name('tenagamedis-kelurahan');
    Route::resource('tenagamedis', 'TenagamedisController');
    Route::get('rumahsakit', 'RumahSakitController@data_rumahsakit')->name('data_rumahsakit');
    // Route::get('pemetaan', 'RumahSakitController@pemetaan_rs')->name('pemetaan_rs');
    Route::get('rskelurahan', 'RumahSakitController@getrskelurahan')->name('rs_kelurahan');
    Route::get('showrskelurahan', 'RumahSakitController@getdetailrskelurahan')->name('show_rskelurahan');
    Route::get('rskecamatan', 'RumahSakitController@getrskecamatan')->name('rs_kecamatan');
    Route::get('rswilayah', 'RumahSakitController@getrskota')->name('rs_kota');
    Route::get('rute', 'RuteController@rute')->name('rute');
    Route::get('pemetaan', 'PemetaanController@pemetaan')->name('pemetaan');

});




///User//////////////////////////
Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User', 'middleware' => ['auth', 'user']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});


////Petugas/////
Route::group(['prefix' => 'petugas', 'as' => 'petugas.', 'namespace' => 'Petugas', 'middleware' => ['auth', 'petugas']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('kecamatan/download', 'KecamatanController@downloadPDF')->name('download-kecamatan');
    Route::resource('kecamatan', 'KecamatanController');
    Route::resource('wilayah', 'WilayahController');
    Route::get('kelurahan/download', 'KelurahanController@downloadPDF')->name('download-kelurahan');
    Route::resource('kelurahan', 'KelurahanController');
    Route::resource('post', 'PostController');
});
