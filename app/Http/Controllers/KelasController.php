<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class KelasController extends Controller
{
    function __construct()
    {
      
         
    }
    public function index()
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
    
      
}
