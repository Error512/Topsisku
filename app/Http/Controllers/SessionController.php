<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Fascades\Session;
class SessionController extends Controller
{
    function index(){
        return view("login");
    }

    function login(Request $request){
        FacadesSession::flash('email', $request->email);
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
            //return 'sukses';
            return redirect('/main')->with('berhasil login');
        }else{
            return $infologin;
            //return redirect('/')->withErrors('username dan pass salah');
        }
    }
}
