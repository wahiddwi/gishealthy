<?php

use App\Http\Controllers\PostController;
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
Route::get('pemetaan/rute', 'PemetaanController@rute')->name('pemetaan.rute');
Route::get('pemetaan/detail/{id}', 'PemetaanController@detail')->name('pemetaan.laykesDetail');
Route::get('pemetaan/covid19/wilayah', 'PemetaanController@covid19wilayah')->name('pemetaan.covid19');
Route::get('wilayah', 'WilayahController@index')->name('wilayah');
Route::get('kecamatan', 'KecamatanController@index')->name('kecamatan');
Route::get('kelurahan', 'KelurahanController@index')->name('kelurahan');
Route::get('rumahsakit', 'RumahSakitController@data_rumahsakit')->name('data_rumahsakit');
Route::get('rumahsakit/kecamatan', 'RumahSakitController@getrskecamatan')->name('rumah_sakit.kecamatan');
Route::get('rumahsakit/kelurahan', 'RumahSakitController@getrskelurahan')->name('rumah_sakit.kelurahan');
Route::get('rumahsakit/kota', 'RumahSakitController@getrskota')->name('rumah_sakit.kota');
Route::get('tenagamedis', 'TenagaMedisController@index')->name('tenagamedis');
Route::get('tenagamedis/wilayah', 'TenagaMedisController@gettenagamediskota')->name('tenagamedis-kota');
Route::get('tenagamedis/kecamatan', 'TenagaMedisController@gettenagamediskecamatan')->name('tenagamedis-kecamatan');
Route::get('tenagamedis/kelurahan', 'TenagaMedisController@getmediskelurahan')->name('tenagamedis-kelurahan');
Route::get('artikel', 'PostController@index')->name('post');
Route::get('post/detail/{id}', 'PostController@artikelDetail')->name('post.artikelDetail');



////Admin/////////////////////////
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('register', 'RegisterController@index')->name('register');
    Route::post('register/post', 'RegisterController@postRegister')->name('post.register');
    Route::resource('user', 'UserController');
    Route::get('post/download/{id}', 'PostController@downloadPDF')->name('post-download');
    Route::resource('post', 'PostController');
    Route::resource('wilayah', 'WilayahController');
    Route::get('kecamatan/download', 'KecamatanController@downloadPDF')->name('download-kecamatan');
    Route::resource('kecamatan', 'KecamatanController');
    Route::get('laykes/download/{id}', 'LaykesController@downloadPDF')->name('download-detail-laykes');
    Route::resource('laykes', 'LaykesController');
    Route::resource('kelurahan', 'KelurahanController');
    Route::get('tenagamedis/wilayah', 'TenagamedisController@gettenagamediskota')->name('tenagamedis-kota');
    Route::get('tenagamedis/kecamatan', 'TenagamedisController@gettenagamediskecamatan')->name('tenagamedis-kecamatan');
    Route::get('tenagamedis/kelurahan', 'TenagamedisController@getmediskelurahan')->name('tenagamedis-kelurahan');
    Route::get('tenagamedis/download', 'TenagamedisController@downloadPDF')->name('download-tenagamedis');
    Route::get('tenagamedis/download/kota', 'TenagamedisController@downloadMedisKota')->name('download-medis_kota');
    Route::get('tenagamedis/download/kecamatan', 'TenagamedisController@downloadMedisKecamatan')->name('download-medis-kecamatan');
    Route::get('tenagamedis/download/kelurahan', 'TenagamedisController@downloadMedisKelurahan')->name('download-medis-kelurahan');
    Route::resource('tenagamedis', 'TenagamedisController');
    Route::get('rumahsakit/download', 'RumahSakitController@downloadPDF')->name('download-rumahsakit');
    Route::get('rumahsakit/download/kelurahan', 'RumahSakitController@downloadRsKelurahan')->name('download-rumahsakit-kelurahan');
    Route::get('rumahsakit/download/kecamatan', 'RumahSakitController@downloadRsKecamatan')->name('download-rumahsakit-kecamatan');
    Route::get('rumahsakit/download/kota', 'RumahSakitController@downloadRsKota')->name('download-rumahsakit-kota');
    Route::get('rumahsakit', 'RumahSakitController@data_rumahsakit')->name('data_rumahsakit');
    // Route::get('pemetaan', 'RumahSakitController@pemetaan_rs')->name('pemetaan_rs');
    Route::get('rskelurahan', 'RumahSakitController@getrskelurahan')->name('rs_kelurahan');
    Route::get('showrskelurahan', 'RumahSakitController@getdetailrskelurahan')->name('show_rskelurahan');
    Route::get('rskecamatan', 'RumahSakitController@getrskecamatan')->name('rs_kecamatan');
    Route::get('rswilayah', 'RumahSakitController@getrskota')->name('rs_kota');
    Route::get('rute', 'RuteController@rute')->name('rute');
    Route::get('pemetaan', 'PemetaanController@pemetaan')->name('pemetaan');
    Route::get('password', 'PasswordController@password')->name('password');
    Route::put('password/update', 'PasswordController@changePassword')->name('password.update');

    Route::get('pasien/getdatawilayah', 'PasienController@getDataWilayah')->name('pasien_wilayah');
    Route::get('pasien/getdatakecamatan', 'PasienController@getDatakecamatan')->name('pasien_kecamatan');
    Route::get('pasien/getdatakelurahan', 'PasienController@getDatakelurahan')->name('pasien_kelurahan');
    Route::get('pasien/getAllData', 'PasienController@getAllData')->name('pasien_allData');
    Route::get('pasien/download', 'PasienController@downloadPDF')->name('pasien-download');
    Route::get('pasien/download/kota', 'PasienController@downloadPasienKota')->name('pasien-download-kota');
    Route::get('pasien/download/kecamatan', 'PasienController@downloadPasienKecamatan')->name('pasien-download-kecamatan');
    Route::get('pasien/download/kelurahan', 'PasienController@downloadPasienKelurahan')->name('pasien-download-kelurahan');
    Route::get('pasien/download/total-kasus', 'PasienController@downloadTotalKasus')->name('pasien-download-total-kasus');
    Route::resource('pasien', 'PasienController');


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
    Route::get('password', 'PasswordController@password')->name('password');
    Route::put('password/update', 'PasswordController@changePassword')->name('password.update');
});
