<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\project;
class ProjectController extends Controller
{

    public function index(Request $request){
        
        return view("components.project");
    }

    public function show(){
          //mengecek apakah user sudah pernah membuat project sebelumnya
          $id_user = [
            'id_user'=> auth()->user()->id
        ];

        if (project::where('id_user', $id_user )->exists()) {
            //menghitung project yang dimiliki user
            $count= project::where('id_user', $id_user )->count();

            return redirect ('/project')->with('project_exist','haiiii');
        }
        else{
            return redirect ('/project')->with('no_project','nopeeeeee');
        }


    }

    public function create(Request $request){
        
        //membuat project
        $validatedData = $request->validate([
            'user_id'=>'required|min:1|max:10',
            'nama_project'=>'required|min:5|max:25'
        ]);


        project::create($validatedData);


        return redirect('/projects');
    }
}
