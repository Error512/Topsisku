<?php

namespace App\Http\Controllers;

use App\Models\Database;
use App\Models\Kriteria;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        //Assign lebih up todate dibanding auth user last project
            $assign = $request->validate([
                'last_project' => 'min:1|max:25'
            ]);

            User::where('id', auth()->user()->id)
            ->update($assign);

            
            
            
            
            
            

            
            
            if (Database::where('project_id', $request->project_id)->exists()) {

                $bc = Database::where('project_id', $assign['last_project'])->get(['csv']);
                $csvValues = $bc->pluck('csv')->toArray();
            
                $csvFile = storage_path("app/{$csvValues[0]}");
                

                //--------------------------PERMASALAHAN EXPLODE ; DAN SHOW KE HTML
                $csv = File::get($csvFile);
                $rows = array_map('str_getcsv', explode("\n", $csv));
                $header = array_shift($rows);

                
                $total_alternatif = count($rows)-1;
                
                
                return view('components.db',['data_header'=>$header,'data_value'=>$rows,'have_db'=>'1',
                    'posts' => Project::where('id', $request->last_project)->get()
                ])->with('total',$total_alternatif);
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
       //Untuk Tabel record database
        $validatedData = $request->validate([
            'csv'=>'required|mimes:csv,txt'
        ]);

        $validatedData['csv']=$request->file('csv')->store('databaseProject');
        $validatedData['user_id']=auth()->user()->id;
        $validatedData['project_id']=auth()->user()->last_project;

        Database::create($validatedData);
        
        

       //Untuk tabel record kriteria guna menampilkan di halaman kriteria
       
       if (Kriteria::where('project_id', auth()->user()->last_project)->exists()){
            return redirect('/cosben');
       }
       
            $file = Database::where('project_id', auth()->user()->last_project)->get(['csv']);
            $csvValues = $file->pluck('csv')->toArray();
            $csvFile = storage_path("app/{$csvValues[0]}");


            //Buka csv dan hanya ambil header saja
            $handle = fopen($csvFile,'r');
            $row = fgetcsv($handle);
            $data = $row;
            fclose($handle);
            //menghapus header pertama sbg namanya
            array_shift($data);

            

            foreach($data as $kriteria){
                $kriteriaData['project_id'] = auth()->user()->last_project;
                $kriteriaData['nama_kriteria'] = $kriteria;
                $kriteriaData['bobot'] = 1;
                $kriteriaData['cos_ben'] = 'Cos';
                $kriteriaData['pilih'] = 'Ya';
                Kriteria::create($kriteriaData);
            }
            
        
            return redirect('/cosben');
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
       
    }
}
