<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class RegisterController extends Controller
{
    public function index(){
        return view("register",[
            'tittle' => 'register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request){

        //mengecek input sesuai dengan format
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:255',
            'email' => ['required','string','email:dns','unique:users'],
            'password' => 'required|min:5|max:255'
        ]);

        //enkripsi password
        $validatedData['password']= bcrypt($validatedData['password']);

        //insert ke db user
        user::create($validatedData);




        return redirect('/')->with('success', 'Registration Sucessfull!');

        

    }
}
