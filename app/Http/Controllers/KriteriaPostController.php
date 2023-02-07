<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Database;
use App\Models\Project;
use App\Models\User;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assign = auth()->user()->last_project;
        if (Database::where('project_id', $assign)->exists()) {
            
            
            

            $header = Kriteria::where('project_id', auth()->user()->last_project)
                  ->pluck('nama_kriteria')
                  ->toArray();
            
            $bobot = Kriteria::where('project_id', auth()->user()->last_project)
                ->pluck('bobot')
                ->toArray();

            $cosben = Kriteria::where('project_id', auth()->user()->last_project)
                ->pluck('cos_ben')
                ->toArray();


            
            
            return view('components.cosben',['have_db'=>'1','data_header'=>$header,'bobot'=>$bobot,'cosben'=>$cosben]);
        }

        
    
        
        
        return view('components.cosben',['have_db'=>'0']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $find = Kriteria::where('project_id',auth()->user()->last_project)->get();
        $count = Kriteria::where('project_id', auth()->user()->last_project)->count();

        //mengubah nilai bobot yang dimasukan user
        for($i=0; $i<$count; $i++){
            $kriteria = $find[$i];
            $kriteria->bobot = $request->input('bobotkriteria')[$i];
            $kriteria->save();
        }

        //mengubah nilai cosben yang dimasukan user
        for($i=0; $i<$count; $i++){
            $kriteria = $find[$i];
            $kriteria->cos_ben = $request->input('cosbenkriteria')[$i];
            $kriteria->save();
        }
        



        return redirect ('/cosben')->with('success', 'Update Sucessfull!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Kriteria $kriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kriteria $kriteria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kriteria $kriteria)
    {
        //
    }
}
