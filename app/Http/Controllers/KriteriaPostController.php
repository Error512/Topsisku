<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Database;
use App\Models\Project;
use App\Models\User;
use App\Models\Rangking;
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

            $pilih = Kriteria::where('project_id', auth()->user()->last_project)
                ->pluck('pilih')
                ->toArray();   


            
            
            return view('components.cosben',['have_db'=>'1','data_header'=>$header,'bobot'=>$bobot,'cosben'=>$cosben,'pilih'=>$pilih]);
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

        //mengubah nilai pilih yang dimasukan user
        for($i=0; $i<$count; $i++){
            $kriteria = $find[$i];
            $kriteria->pilih = $request->input('choosekriteria')[$i];
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
         
            
            
            //return $total_kriteria;
            //return $request->choosekriteria;
            //---------------------Men Assign nilai 0 untuk kriteria yang tidak dipilih---------------
            $bobot_dipakai[0]=0;
            $not_choosen = 0;
            for($i=0;$i<$total_kriteria;$i++){
                if($request->choosekriteria[$i]=="Tidak"){
                    $bobot_dipakai[$i]="0";
                    $not_choosen +=1;
                    
                }
                else{
                    $bobot_dipakai[$i]=$request->bobotkriteria[$i];
                }
                
            }
            
            if(count($bobot_dipakai)==$not_choosen){
                return redirect('/cosben')->with('no_criteria','Choose at least 1 Criteria');
            }
            
            
            
            
            //----------------------Bagian Hitung-----------------------------
            $pembagi[0]=1;
            $normalisasi_terbobot[0][0]=1;
            $max[0]=1;
            $min[0]=1;
            $jarak_ideal_positif[0]=1;
            $jarak_ideal_negatif[0]=1;
            $preferensi[0] =1;
            $ranking[0][0]=1;
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
                    
                    $normalisasi_terbobot[$o][$i]= $normalisasi[$o][$i]*$bobot_dipakai[$i];
                    
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

            // Jarak Ideal Negatif
            for($o=0 ; $o<$total_rows; $o++){
                $tampung = 0;
                for($i=0 ; $i<$total_kriteria; $i++){
                    $tampung = $tampung + (pow(($normalisasi_terbobot[$o][$i]-$min[$i]),2));
                }
                $jarak_ideal_negatif[$o] = sqrt($tampung);
                
            }
            
            
            
            //--------------------5.Menentukan preferensi/perangkingan---------------------
            for($o=0 ; $o<$total_rows; $o++){
                $preferensi[$o] =  $jarak_ideal_negatif[$o]/($jarak_ideal_positif[$o] + $jarak_ideal_negatif[$o]);
                
            }
            

            //--------------------6. Membuat dalam bentuk ranking---------------------
            
            
            //Satukan ke variabel $ranking
            for($o=0; $o<$total_rows ; $o++){
                $ranking[$o][0]=$rows[$o][0];
                $ranking[$o][1]=$preferensi[$o];
            }


            // variabel tampung mengambil haya nilai array multidimensional column ke 2 di value array pertama
            $urut = array_column($ranking, 1);
  
            // Mengurutkan dari yang terbesar ke terkecil bedasarkan column ke 2
            array_multisort($urut, SORT_DESC, $ranking);
            

            //Sebelum memasukan ke db, akan di cek dulu apakah sudah ada perhitungan sebelumnya. Kalau ada maka akan di delete
            if(Rangking::where('project_id', auth()->user()->last_project)->exists()){
                Rangking::where('project_id', auth()->user()->last_project)->delete();
            }



            //Memasukan rangking terurut ke db
            for($o=0; $o<$total_rows ; $o++){
                $insertranking['project_id'] = auth()->user()->last_project;
                $insertranking['alternatif'] = $ranking[$o][0];
                $insertranking['preferensi'] = $ranking[$o][1];
                $insertranking['urutan'] = $o+1;
                Rangking::create($insertranking);
            }

            


            

            return redirect ('/hitung');
            
            
         }
         
        

        
        
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
