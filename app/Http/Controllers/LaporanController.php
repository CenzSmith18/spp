<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use PDF;
class LaporanController extends Controller
{
    function __construct()
    {
      
         
    }
    public function index()
    {
        $pembayaran = DB::table('pembayaran')
        ->join('users', 'pembayaran.id_petugas', '=', 'users.id') //petugas
        ->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn') //siswa
        ->join('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas') //petugas
        ->select('pembayaran.*','siswa.*','kelas.*', 'users.*')
        ->paginate();
      
        return view('laporan',['pembayaran' => $pembayaran]);

    }
    public function cetak_pdf()
    {
        $pembayaran = DB::table('pembayaran')
        ->join('users', 'pembayaran.id_petugas', '=', 'users.id') //petugas
        ->join('siswa', 'pembayaran.nisn', '=', 'siswa.nisn') //siswa
        ->join('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas') //petugas
        ->select('pembayaran.*','siswa.*','kelas.*', 'users.*')
        ->paginate();
        $pdf = PDF::loadview('cetak_laporan',['pembayaran'=>$pembayaran]);
        return $pdf->download('laporan-pembayaran-spp-pdf');
      

    }
    
    
      
}
