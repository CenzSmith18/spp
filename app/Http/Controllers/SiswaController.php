<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SiswaController extends Controller
{
    function __construct()
    {
      
         
    }
    public function index()
    {
        $siswa = DB::table('siswa')->get();
        
        return view('siswa',['siswa' => $siswa]);
    }
    public function tambahsiswa(Request $request)
    {	
        DB::table('siswa')->insert([
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_spp' => $request->no_telp,
        ]);
        return redirect('siswa');
    }
    public function editsiswa($nisn)
    {	
        $siswa = DB::table('siswa')->where('nisn',$nisn)->get();
        return view('siswa/editsiswa',['siswa' => $siswa]);
    }  

    public function updatesiswa(Request $request)
    {

        DB::table('siswa')->where('nisn',$request->nisn)->update([
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_spp' => $request->id_spp,
        ]);

        return redirect('siswa');
    }

    public function hapussiswa($nisn)
    {	
        $siswa = DB::table('siswa')->where('nisn',$nisn)->delete();
        return redirect('siswa');
    }
      
}
