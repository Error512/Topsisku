<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;

class SessionController extends Controller
{
    function index(){
        return view("login");
    }

    function login(Request $request){

        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infologin = [
            'email' =>$request->email,
            'password'=>$request->password
        ];

        if(Auth::attempt($infologin)){

            $request->session()->regenerate();

 
            return redirect()->intended('/main');
        }else{
            return redirect('/')->with('error_account', 'Email dan Password yang dimasukan salah');
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
