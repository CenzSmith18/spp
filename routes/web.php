<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/dashboard','AdminController@index');
    /*spp*/
    Route::get('/spp','SppController@index');
    Route::post('/tambah_spp','SppController@tambahspp');
    Route::get('/edit_spp/{id}','SppController@editspp');
    Route::post('/update_spp','SppController@updatespp');
    Route::get('/hapus_spp/{id}','SppController@hapusspp');

    /*kelas*/
    Route::get('/kelas','KelasController@index');
    Route::post('/tambah_kelas','KelasController@tambahkelas');
    Route::get('/edit_kelas/{id}','KelasController@editkelas');
    Route::post('/update_kelas','KelasController@updatekelas');
    Route::get('/hapus_kelas/{id}','KelasController@hapuskelas');

     /*siswa*/
     Route::get('/siswa','SiswaController@index');
    Route::post('/tambah_siswa','SiswaController@tambahsiswa');
    Route::get('/edit_siswa/{nisn}','SiswaController@editsiswa');
    Route::post('/update_siswa','SiswaController@updatesiswa');
    Route::get('/hapus_siswa/{nisn}','SiswaController@hapussiswa');

    /*pembayaran*/
    Route::get('/pembayaran','PembayaranCotroller@index');
    Route::post('/bayar_spp','PembayaranCotroller@bayar_spp');
});

Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
}); 