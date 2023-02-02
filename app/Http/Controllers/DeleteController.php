<?php

namespace App\Http\Controllers;
use App\Models\Database;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
class DeleteController extends Controller
{
    public function delete(Request $request){

        
        $tampung= $request->project_id;

        $object = json_decode($tampung);

  
        Database::where('project_id', $object->id)->delete();


        return view('components.db',['have_db'=>'0',
            'posts' => Project::where('id', $object->id)->get()
        ]);
    }

    
}
