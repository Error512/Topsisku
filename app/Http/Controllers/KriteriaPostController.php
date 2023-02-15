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
        
        
        //Melakukan perhitungan disini

        if (Database::where('project_id', auth()->user()->last_project)->exists()) {

            $bc = Database::where('project_id', auth()->user()->last_project)->get(['csv']);
            $csvValues = $bc->pluck('csv')->toArray();
        
            $csvFile = storage_path("app/{$csvValues[0]}");
            

            //--------------------------PERMASALAHAN EXPLODE ; DAN SHOW KE HTML
            $csv = File::get($csvFile);
            $rows = array_map('str_getcsv', explode("\n", $csv));
            $clean_header = array_shift($rows);
            
            

           


            //------------------Bagian Cleaning--------------
            //Clean Row dan header, hanya mengambil kriteria dan nilai kriteria saja bukan nama alternatif
            $clean_rows = array_map(function ($row) {
                return array_slice($row, 1);
            }, $rows);

            array_shift($clean_header);
           
            $total_kriteria = count($clean_rows[1]);
            $total_rows = count($clean_rows)-1;
            
            
            //----------------------Bagian Hitung-----------------------------
            $pembagi[0]=1;
            $normalisasi_terbobot[0][0]=1;
            $max[0]=1;
            $min[0]=1;
            $jarak_ideal_positif[0]=1;
            $jarak_ideal_negatif[0]=1;
            
            //--------------------1. Buat Pembagi---------------------
            for($i=0 ; $i<$total_kriteria; $i++){
                $sementara = 0;
                for($o=0 ; $o<$total_rows; $o++){
                    
                    $sementara = pow($clean_rows[$o][$i],2)+$sementara;
                    
                }
                
                $pembagi[$i] = sqrt($sementara);
                
            }

            //--------------------2. Kalikan pembagi dengan nilai alternatif awal (Normalisasi)---------------------
            for($i=0 ; $i<$total_kriteria; $i++){
                for($o=0 ; $o<$total_rows; $o++){
                    $normalisasi[$o][$i] = $clean_rows[$o][$i] / $pembagi[$i];
                }
            }

            

            //--------------------3. Kalikan pembagi dikali dengan bobot (Normalisasi terbobot)---------------------
            for($i=0 ; $i<$total_kriteria; $i++){

                for($o=0 ; $o<$total_rows; $o++){
                    
                    $normalisasi_terbobot[$o][$i]= $normalisasi[$o][$i]*$request->bobotkriteria[$i];
                    
                }
            }

            //--------------------4.Menemukan nilai min max---------------------
            //Menggunakan loop per foreach dan di save ke array tsb
            for($i=0 ; $i<$total_kriteria; $i++){
                //Mengecek apakah user memasukan Cos atau benefit
                if($request->cosbenkriteria[$i] == "Cos"){
                    //Nilai terbesar dijadikan maximum dan nilai terkecil dijadikan minimum
                    $max[$i] = max(array_column($normalisasi_terbobot, $i));
                    $min[$i] = min(array_column($normalisasi_terbobot, $i));
                    

                }
                
                else if($request->cosbenkriteria[$i] == "Ben"){
                    //Nilai terkecil dijadikan maxmimum dan nilai terkecil dijadikan minimum
                    $max[$i] = min(array_column($normalisasi_terbobot, $i));
                    $min[$i] = max(array_column($normalisasi_terbobot, $i));
                }
                
            }
            
            //--------------------5.Menentukan Jarak ideal positif negatif---------------------
            // Jarak Ideal Positif
            for($o=0 ; $o<$total_rows; $o++){
                $tampung = 0;
                for($i=0 ; $i<$total_kriteria; $i++){
                    $tampung = $tampung + (pow(($max[$i]-$normalisasi_terbobot[$o][$i]),2));
                }
                $jarak_ideal_positif[$o] = sqrt($tampung);
                
            }

            // Jarak Ideal PNegatif
            for($o=0 ; $o<$total_rows; $o++){
                $tampung = 0;
                for($i=0 ; $i<$total_kriteria; $i++){
                    $tampung = $tampung + (pow(($normalisasi_terbobot[$o][$i]-$min[$i]),2));
                }
                $jarak_ideal_negatif[$o] = sqrt($tampung);
                
            }
            
            return $jarak_ideal_negatif;
         }
         
        

        //End
        return redirect ('/hitung');
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
