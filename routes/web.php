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

    Route::get('/admin/dashboard','AdminController@index');
    /*spp*/
    Route::get('/admin/spp','AdminController@spp');
    Route::post('/admin/tambah_spp','AdminController@tambahspp');
    Route::get('/admin/edit_spp/{id}','AdminController@editspp');
    Route::post('/admin/update_spp','AdminController@updatespp');
    Route::get('/admin/hapus_spp/{id}','AdminController@hapusspp');

    /*kelas*/
    Route::get('/admin/kelas','AdminController@kelas');
    Route::post('/admin/tambah_kelas','AdminController@tambahkelas');
    Route::get('/admin/edit_kelas/{id}','AdminController@editkelas');
    Route::post('/admin/update_kelas','AdminController@updatekelas');
    Route::get('/admin/hapus_kelas/{id}','AdminController@hapuskelas');

     /*siswa*/
     Route::get('/admin/siswa','AdminController@siswa');
    Route::post('/admin/tambah_siswa','AdminController@tambahsiswa');
    Route::get('/admin/edit_siswa/{id}','AdminController@editsiswa');
    Route::post('/admin/update_siswa','AdminController@updatesiswa');
    Route::get('/admin/hapus_siswa/{id}','AdminController@hapussiswa');
});

Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
}); 