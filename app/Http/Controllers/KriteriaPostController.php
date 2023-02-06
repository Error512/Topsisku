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
            $file = Database::where('project_id', $assign)->get(['csv']);
            $csvValues = $file->pluck('csv')->toArray();
            $csvFile = storage_path("app/{$csvValues[0]}");


            //Buka csv dan hanya ambil header saja
            $handle = fopen($csvFile,'r');
            $row = fgetcsv($handle);
            $data = $row;
            fclose($handle);

            return view('components.cosben',['have_db'=>'1','data_header'=>$data]);
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
        //
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
