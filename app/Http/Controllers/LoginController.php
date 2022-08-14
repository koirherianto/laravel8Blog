<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
       return view('login.index',[
        'title' => 'Login',
        'active' => 'login'
       ]);
    }

    public function authenticate(Request $request){
        $credensial = $request->validate([
            // 'email' => ['required','email:dns'],
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credensial)){
            //untuk menghindari tehnik hacking Session_fixation
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');

        }

        // return back()->withErrors([
        //     'email' => 'Email atau password tidak sesuai'
        // ]);

        return back()->with('loginError','Login Failed');
    }

    public function logout(Request $request){
        //logout
        Auth::logout();

        //menghapus session agar tidak dibajak
        $request->session()->invalidate();

        //bisa menggunakan request() sebagai pengganti $request
        // request()->session()->invalidate();

        //mengenerate session ulang
        $request->session()->regenerateToken();
        
        return redirect('/dashboard');
    }
}