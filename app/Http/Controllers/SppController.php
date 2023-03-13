<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SppController extends Controller
{
    function __construct()
    {
      
         
    }
    public function index()
    {
        $spp = DB::table('spp')->get();
        
        return view('spp',['spp' => $spp]);
    } 

   
    public function tambahspp(Request $request)
    {	
        DB::table('spp')->insert([
            'id_spp' => $request->id_spp,
            'tahun' => $request->tahun,
            'nominal' => $request->nominal
        ]);
        return redirect('spp');
    }
    public function editspp($id)
    {	
        $spp = DB::table('spp')->where('id_spp',$id)->get();
        return view('spp/editspp',['spp' => $spp]);
    }  

    public function updatespp(Request $request)
    {
        // update data pegawai
        DB::table('spp')->where('id_spp',$request->id_spp)->update([
            'tahun' => $request->tahun,
            'nominal' => $request->nominal
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('spp');
    }

    public function hapusspp($id)
    {	
        $spp = DB::table('spp')->where('id_spp',$id)->delete();
        return redirect('spp');
    }


    /*kelas */

    public function kelas()
    {
        $kelas = DB::table('kelas')->get();
        
        return view('kelas',['kelas' => $kelas]);
    }
    public function tambahkelas(Request $request)
    {	
        DB::table('kelas')->insert([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian
        ]);
        return redirect('kelas');
    }
    public function editkelas($id)
    {	
        $kelas = DB::table('kelas')->where('id_kelas',$id)->get();
        return view('kelas/editkelas',['kelas' => $kelas]);
    }  

    public function updatekelas(Request $request)
    {

        DB::table('kelas')->where('id_kelas',$request->id_kelas)->update([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian
        ]);

        return redirect('kelas');
    }

    public function hapuskelas($id)
    {	
        $kelas = DB::table('kelas')->where('id_kelas',$id)->delete();
        return redirect('kelas');
    }

    /*siswa */

    public function siswa()
    {
        $siswa = DB::table('siswa')->get();
        
        return view('siswa',['siswa' => $siswa]);
    }
    public function tambahsiswa(Request $request)
    {	
        DB::table('kelas')->insert([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian
        ]);
        return redirect('kelas');
    }
    public function editsiswa($id)
    {	
        $kelas = DB::table('kelas')->where('id_kelas',$id)->get();
        return view('kelas/editkelas',['kelas' => $kelas]);
    }  

    public function updatesiswa(Request $request)
    {

        DB::table('kelas')->where('id_kelas',$request->id_kelas)->update([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian
        ]);

        return redirect('kelas');
    }

    public function hapussiswa($id)
    {	
        $kelas = DB::table('kelas')->where('id_kelas',$id)->delete();
        return redirect('kelas');
    }
    
      
}
