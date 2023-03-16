<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SiswaController;
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
Route::get('/login/petugas','SiswaController@login');
Route::get('/login/siswa','SiswaController@login');
Route::post('/login/siswa','SiswaController@login_action');
Route::get('/logout/siswa','SiswaController@logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



    Route::get('/dashboard','AdminController@index');
    /*spp*/
Route::middleware(['auth', 'level:admin'])->group(function () {
    Route::get('/spp','SppController@index');
    Route::post('/tambah_spp','SppController@tambahspp');
    Route::get('/edit_spp/{id}','SppController@editspp');
    Route::post('/update_spp','SppController@updatespp');
    Route::get('/hapus_spp/{id}','SppController@hapusspp');
});

    /*kelas*/
Route::middleware(['auth', 'level:admin'])->group(function () {
    Route::get('/kelas','KelasController@index');
    Route::post('/tambah_kelas','KelasController@tambahkelas');
    Route::get('/edit_kelas/{id}','KelasController@editkelas');
    Route::post('/update_kelas','KelasController@updatekelas');
    Route::get('/hapus_kelas/{id}','KelasController@hapuskelas');
});

     /*siswa*/
Route::middleware(['auth', 'level:admin'])->group(function () {
    Route::get('/siswa','SiswaController@index');
    Route::post('/tambah_siswa','SiswaController@tambahsiswa');
    Route::get('/edit_siswa/{nisn}','SiswaController@editsiswa');
    Route::post('/update_siswa','SiswaController@updatesiswa');
    Route::get('/hapus_siswa/{nisn}','SiswaController@hapussiswa');
    Route::get('/siswa/cari','SiswaController@cari');
});
    /*pembayaran*/
    Route::get('/pembayaran','PembayaranController@index');
    Route::post('/bayar_spp','PembayaranController@bayar_spp');
    Route::get('/pembayaran/cari','PembayaranController@cari');
    /*histori pembayaran*/
    
    Route::get('/historipembayaran','PembayaranController@history');
    Route::get('/histori-pembayaran/cari','PembayaranController@carihistori');

    /* Laporan */
    Route::get('/generate_laporan','LaporanController@index');
    Route::get('/generate_laporan/cetak_pdf','LaporanController@cetak_pdf');
    /*petugas*/
Route::middleware(['auth', 'level:admin'])->group(function () {
    Route::get('/petugas','PetugasController@index');
    Route::post('/tambah_petugas','PetugasController@tambahpetugas');
    Route::get('/edit_petugas/{id}','PetugasController@editpetugas');
    Route::post('/update_petugas','PetugasController@updatepetugas');
});


