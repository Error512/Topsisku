<?php

namespace App\Http\Controllers;

use App\Models\Database;
use App\Models\Project;
use App\Models\User;

use Illuminate\Http\Request;


class DbPostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Kalau dia belum pernah buka project sebelumnya, maka akan di assign
        if($request!=Null){

            $assign = $request->validate([
                'last_project' => 'min:1|max:25'
            ]);

            User::where('id', auth()->user()->id)
            ->update($assign);

            
            return view('components.db',[
                'posts' => Project::where('id', $request->last_project)->get()
            ]);
        };
        
        //kalau sudah pernah buka project sebelumnya, maka akan diliat dari project
        //return view('components.db',[
            //'posts' => Project::where('id', auth()->user()->last_project)->get()
        //]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->file('csv')->store('databaseProject');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Database  $db
     * @return \Illuminate\Http\Response
     */
    public function show(Database $db)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Database  $db
     * @return \Illuminate\Http\Response
     */
    public function edit(Database $db)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Database  $db
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Database $db)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Database  $db
     * @return \Illuminate\Http\Response
     */
    public function destroy(Database $db)
    {
  
    }
}
