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
        
            $assign = $request->validate([
                'last_project' => 'min:1|max:25'
            ]);

            User::where('id', auth()->user()->id)
            ->update($assign);

            
             
            
            if (Database::where('project_id', $request->project_id)->exists()) {
                
                return view('components.db',['have_db'=>'1',
                    'posts' => Project::where('id', $request->last_project)->get()
                ]);
             }
             
             

             return view('components.db',['have_db'=>'0',
                'posts' => Project::where('id', $request->last_project)->get()
            ]);

            
        
        
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

        $validatedData = $request->validate([
            'csv'=>'required|mimes:csv,txt'
        ]);
        $validatedData['csv']=$request->file('csv')->store('databaseProject');
        $validatedData['user_id']=auth()->user()->id;
        $validatedData['project_id']=auth()->user()->last_project;

        Database::create($validatedData);

        

        return view('components.db',['have_db'=>'1',
            'posts' => Project::where('id', auth()->user()->last_project)->get()
       ]);

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
    public function destroy(Database $Database)
    {
        return 'aa';
        //$data = Database::where('id', auth()->user()->last_project->get());
        //Database::destroy($data->id);
        //return 'aa';
    }
}
