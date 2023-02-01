<?php

namespace App\Http\Controllers;
use App\Models\Database;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function delete(Request $request){

        
        Database::where('project_id', $request->project_id)->delete();


        return view('components.db',['have_db'=>'0',
            'posts' => Project::where('id', $request->project_id)->get()
        ]);
    }
}
