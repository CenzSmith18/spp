<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
class PembayaranController extends Controller
{
    function __construct()
    {
      
         
    }
    public function index()
    {
        $nisn = 2312;
        $id_spp = 4;
        $siswa = DB::table('siswa')
        ->join('spp', 'siswa.id_spp', '=', 'spp.id_spp')
        ->join('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')
        ->select('siswa.*', 'spp.*','kelas.*')
        ->where('nisn',$nisn)
        ->paginate(1);
        $spp = DB::table('spp')->where('id_spp',$id_spp)->get();
        return view('pembayaran',['siswa' => $siswa, 'spp' => $spp]);
    }
    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
            
    		// mengambil data dari table pegawai sesuai pencarian data
            $siswa = DB::table('siswa')
            ->join('spp', 'siswa.id_spp', '=', 'spp.id_spp')
            ->join('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')
            ->select('siswa.*', 'spp.*','kelas.*')
            ->where('nama','like',"%".$cari."%")
            ->paginate(1);
            $id_spp;
            foreach ($siswa as $p) {
                $id_spp = $p->id_spp;
            }
        $spp = DB::table('spp')->where('id_spp',$id_spp)->get();
    		// mengirim data pegawai ke view index
        return view('pembayaran',['siswa' => $siswa, 'spp' => $spp]);
 
	}
    public function bayar_spp(Request $request)
    {	
        DB::table('pembayaran')->insert([
            'id_petugas' => Auth::user()->id,
            'nisn' => $request->nisn,
            'tgl_bayar' => date("Y/m/d"),
            'bulan_dibayar' => date("m"),
            'tahun_dibayar' => date("Y"),
            'id_spp' => $request->id_spp,
            'jumlah_bayar' => $request->jumlah_bayar,
            
        ]);
        $kelas = DB::table('spp')->where('id_spp',$request->id_spp)->delete();
        return redirect('pembayaran');
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
    
      
}
