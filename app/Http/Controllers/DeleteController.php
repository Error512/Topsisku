<?php

namespace App\Http\Controllers;
use App\Models\Database;
use App\Models\Project;
use App\Models\Kriteria;
use App\Models\Rangking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
class DeleteController extends Controller
{
    //function ini berfungsi untuk menghapus db yg sudah diupload
    public function delete(Request $request){
        
        
        $tampung= $request->project_id;

        $object = json_decode($tampung);
        
        $hapus = Database::where('project_id', $object->id)->pluck('csv')->toArray();
        Storage::delete($hapus);
        
        Database::where('project_id', $object->id)->delete();
        
        
        return view('components.db',['have_db'=>'0',
            'posts' => Project::where('id', $object->id)->get()
        ]);
    }

    
}
