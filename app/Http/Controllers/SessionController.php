<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\project;
use Illuminate\Support\Facades\Session as FacadesSession;

class SessionController extends Controller
{
    function index(){
        return view("login");
    }

    function login(Request $request){

        //Akan memvalidasi email dan password dimasukan oleh user
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        //memasukan email dan password ke variabel infologin
        $infologin = [
            'email' =>$request->email,
            'password'=>$request->password
        ];

        //mengecek akun bedasarkan email dan password yg dimasukan user
        if(Auth::attempt($infologin)){

            $request->session()->regenerate();

            //--------------------------
           
            //----------------
 
            return redirect()->intended('/projects');
        }else{
            return redirect('/')->with('error_account', 'Email dan Password yang dimasukan salah');
        }
    }

    //logout dan keluar dari sesi
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
