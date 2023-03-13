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
        $siswa = DB::table('users')
        ->where('level', "siswa")
        ->count();
        $petugas = DB::table('users')
        ->where('level', "petugas")
        ->count();
        $spp = DB::table('spp')
        ->count();
        return view('adminHome',['siswa' => $siswa, 'petugas' => $petugas, 'spp' => $spp]);
    } 

    public function spp()
    {
        $spp = DB::table('spp')->get();
        
        return view('admin/spp',['spp' => $spp]);
    }
    public function tambahspp(Request $request)
    {	
        DB::table('spp')->insert([
            'tahun' => $request->tahun,
            'nominal' => $request->nominal
        ]);
        return redirect('admin/spp');
    }
    public function editspp($id)
    {	
        $spp = DB::table('spp')->where('id_spp',$id)->get();
        return view('admin/spp/editspp',['spp' => $spp]);
    }  

    public function updatespp(Request $request)
    {
        // update data pegawai
        DB::table('spp')->where('id_spp',$request->id_spp)->update([
            'tahun' => $request->tahun,
            'nominal' => $request->nominal
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('admin/spp');
    }

    public function hapusspp($id)
    {	
        $spp = DB::table('spp')->where('id_spp',$id)->delete();
        return redirect('admin/spp');
    }


    /*kelas */

    public function kelas()
    {
        $kelas = DB::table('kelas')->get();
        
        return view('admin/kelas',['kelas' => $kelas]);
    }
    public function tambahkelas(Request $request)
    {	
        DB::table('kelas')->insert([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian
        ]);
        return redirect('admin/kelas');
    }
    public function editkelas($id)
    {	
        $kelas = DB::table('kelas')->where('id_kelas',$id)->get();
        return view('admin/kelas/editkelas',['kelas' => $kelas]);
    }  

    public function updatekelas(Request $request)
    {

        DB::table('kelas')->where('id_kelas',$request->id_kelas)->update([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian
        ]);

        return redirect('admin/kelas');
    }

    public function hapuskelas($id)
    {	
        $kelas = DB::table('kelas')->where('id_kelas',$id)->delete();
        return redirect('admin/kelas');
    }

    /*siswa */

    public function siswa()
    {
        $siswa = DB::table('siswa')->get();
        
        return view('admin/siswa',['siswa' => $siswa]);
    }
    public function tambahsiswa(Request $request)
    {	
        DB::table('kelas')->insert([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian
        ]);
        return redirect('admin/kelas');
    }
    public function editsiswa($id)
    {	
        $kelas = DB::table('kelas')->where('id_kelas',$id)->get();
        return view('admin/kelas/editkelas',['kelas' => $kelas]);
    }  

    public function updatesiswa(Request $request)
    {

        DB::table('kelas')->where('id_kelas',$request->id_kelas)->update([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian
        ]);

        return redirect('admin/kelas');
    }

    public function hapussiswa($id)
    {	
        $kelas = DB::table('kelas')->where('id_kelas',$id)->delete();
        return redirect('admin/kelas');
    }
    
      
}
