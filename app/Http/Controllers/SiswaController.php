<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use DB;
class SiswaController extends Controller
{
    use AuthenticatesUsers;
    function __construct()
    {
      
         
    }
    public function login()
    {
        $data['title'] = 'Login';
        return view('siswa/login', $data);
    }
    public function login_action(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'nisn' => 'required',
            'nama' => 'required',
        ]);
        $nisn = $request->nisn;
        if (Auth::guard('siswa')->attempt(['nisn' => $request->nisn, 'password' => 
            $request->password]))
        {
            $details = Auth::guard('siswa')->user();
         
            if (Auth::guard('siswa')->check()) {
                return redirect('/dashboard');
            }
       

        
        } else {
            return 'auth fail';
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function index()
    {
        // $siswa = DB::table('siswa')
        // ->join('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')
        // ->select('siswa.*','kelas.*')
        // ->get();
        //$siswa = DB::table('siswa')->get();
        $siswa = DB::table('siswa')
        ->leftJoin('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')
        ->get();
        
        return view('siswa',['siswa' => $siswa]);
    }
    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$siswa = DB::table('siswa')
		->where('nama','like',"%".$cari."%")
        ->join('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')
		->paginate();
 
    		// mengirim data pegawai ke view index
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
            'id_spp' => $request->id_spp,
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
