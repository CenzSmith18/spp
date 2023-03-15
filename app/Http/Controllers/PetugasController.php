<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DB;
class PetugasController extends Controller
{
    function __construct()
    {
      
         
    }
    public function index()
    {
        $petugas = DB::table('users')->get();
        
        return view('petugas',['petugas' => $petugas]);
    } 

   
    public function tambahpetugas(Request $request)
    {	
        DB::table('users')->insert([
            'username' => $request->username,
            'nama_petugas' => $request->nama,
            'password' => Hash::make($request->password),
            'level' => 'petugas'
        ]);
        return redirect('petugas');
    }
    public function editpetugas($id)
    {	
        $petugas= DB::table('users')->where('id',$id)->get();
        return view('petugas/editpetugas',['petugas' => $petugas]);
    }  

    public function updatepetugas(Request $request)
    {
        // update data pegawai
        DB::table('users')->where('id',$request->id)->update([
            'username' => $request->username,
            'nama_petugas' => $request->nama
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('petugas');
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
