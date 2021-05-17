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
Route::get('pemetaan', 'PemetaanController@pemetaan')->name('pemetaan');
Route::get('wilayah', 'WilayahController@index')->name('wilayah');
Route::get('kecamatan', 'KecamatanController@index')->name('kecamatan');
Route::get('kelurahan', 'KelurahanController@index')->name('kelurahan');
Route::get('rumahsakit', 'RumahSakitController@data_rumahsakit')->name('data_rumahsakit');
Route::get('rumahsakit/kecamatan', 'RumahSakitController@getrskecamatan')->name('rumah_sakit.kecamatan');
Route::get('rumahsakit/kelurahan', 'RumahSakitController@getrskelurahan')->name('rumah_sakit.kelurahan');
Route::get('rumahsakit/kota', 'RumahSakitController@getrskota')->name('rumah_sakit.kota');



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
    Route::get('profile', 'ProfilController@profil')->name('profil');
    Route::get('pasien', 'PasienController@index')->name('data_pasien');
    Route::get('pasien/create', 'PasienController@create')->name('create');
    Route::get('pasien/getdatawilayah', 'PasienController@getDataWilayah')->name('pasien_wilayah');
    Route::get('pasien/getdatakecamatan', 'PasienController@getDatakecamatan')->name('pasien_kecamatan');
    Route::get('pasien/getdatakelurahan', 'PasienController@getDatakelurahan')->name('pasien_kelurahan');
    Route::get('pasien/getAllData', 'PasienController@getAllData')->name('pasien_allData');


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
