<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Database;
use App\Models\Kriteria;
use App\Models\Rangking;

use App\Models\User;
use Illuminate\Http\Request;

class ProjectPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
        return view("components.project" ,[
            'posts' => Project::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //membuat project
        
        
        $validatedData = $request->validate([
            'id_user'=>'required|min:1|max:10',
            'nama_project'=>'required|min:5|max:25',
            'deskripsi_project'=>'required|min:5|max:25'
        ]);


        project::create($validatedData);


        return redirect('/projects');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'user_id'=>'required|min:1|max:10',
            'nama_project'=>'required|min:5|max:25',
            'deskripsi_project'=>'required|min:5|max:40'
        ]);


        project::create($validatedData);


        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        Database::where('project_id', $project->id)->delete();
        Rangking::where('project_id', $project->id)->delete();
        Kriteria::where('project_id', $project->id)->delete();
        project::destroy($project->id);
        return redirect('/projects');
    }
}
