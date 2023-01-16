<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;
class ProjectController extends Controller
{
    public function create(Request $request){
        

        $validatedData = $request->validate([
            'id_user'=>'required|min:1|max:10',
            'nama_project'=>'required|min:5|max:25'
        ]);


        project::create($validatedData);


        return redirect('/db');
    }
}
