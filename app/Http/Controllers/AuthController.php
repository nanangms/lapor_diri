<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function postlogin(Request $request){
        if (Auth::attempt($request->only('username','password'))){
            if(auth()->user()->aktif == 'N'){
                return redirect('/login')->with('gagal','Akun Anda di Non Aktifkan');
            }
            return redirect('/dashboard');
        }
        return redirect('/login')->with('gagal','Gagal Login! Username dan password tidak cocok');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login')->with('sukses','Anda Berhasil Logout!');
    }

    public function akses_terbatas(){
        return view('auth.akses_terbatas');
    }
}
