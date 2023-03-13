<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AdminController extends Controller
{
    function __construct()
    {
      
         
    }
    public function index()
    {
        $siswa = DB::table('siswa')
       
        ->count();
        $petugas = DB::table('users')
        ->where('level', "petugas")
        ->count();
        $spp = DB::table('spp')
        ->count();
        $kelas = DB::table('kelas')
        ->count();
        return view('admin',['siswa' => $siswa, 'petugas' => $petugas, 'spp' => $spp, 'kelas' => $kelas]);
    } 
      
}
