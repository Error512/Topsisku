<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Hitung;
use App\Models\Rangking;

use Illuminate\Http\Request;

class HitungPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      

        if (Rangking::where('project_id', auth()->user()->last_project)->exists()) {
            $alternatif = Rangking::where('project_id', auth()->user()->last_project)->get();
            return view('components.hitung',['rangking'=>$alternatif])->with('ranked','ada');
         }
         return view('components.hitung')->with('no_rank','ga ada');

        
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
     * @param  \App\Models\Hitung  $hitung
     * @return \Illuminate\Http\Response
     */
    public function show(Hitung $hitung)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hitung  $hitung
     * @return \Illuminate\Http\Response
     */
    public function edit(Hitung $hitung)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hitung  $hitung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hitung $hitung)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hitung  $hitung
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hitung $hitung)
    {
        //
    }
}
