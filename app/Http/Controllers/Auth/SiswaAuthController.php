<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class SiswaAuthController extends Controller
{
    use AuthenticatesUsers;

    protected $maxAttempts = 3;
    protected $decayMinutes = 2;

    public function __construct()
    {
        $this->middleware('guest:siswa')->except('postLogout');
    }

    public function getLogin()
    {
        return view('/siswa/login');
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'nama' => 'required',
        ]);

        if (auth()->guard('siswa')->attempt($request->only('nisn', 'nama'))) {
            $request->session()->regenerate();
            $this->clearLoginAttempts($request);
            return redirect()->intended();
        } else {
            $this->incrementLoginAttempts($request);

            return redirect()
                ->back()
                ->withInput()
                ->withErrors(["Incorrect user login details!"]);
        }
    }

    public function postLogout()
    {
        auth()->guard('siswa')->logout();
        session()->flush();

        return view('/siswa/login');
    }
}
