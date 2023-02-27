@extends('layout.full')
@section('content')





<div class="container" style="margin-left: 20%">
  
        @if(session()->has('no_criteria'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" >
        {{session('no_criteria')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  
        </div>
  
        @endif

        @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align:center"> 
	        {{session('error')}}
	
        </div>
        @endif
  
</div>

<div class="container-fluid" >
  
    <br>
    <br>
    
   

    
    <!--Nanti diganti sesuai judul projectnya-->
    
   
    

    
    <br>
 
    <div class="container-fluid " id="cosbenbox">
        <br>
        <div class="row">
            
            <div class="col" >
              <h2 id="" style="padding-left: 40%">Kriteria</h2>
            </div>
            <div class="col" >
                <h2 id="">Cos/Ben</h2>
              </div>
              <div class="col" >
                <h2 id="middle" >Bobot</h2>
              </div>
              <div class="col" >
                <h2 id="middle" >Pilih </h2>
              </div>
              
              <hr style="height:5px;border-width:10;color:rgb(0, 0, 0);">
            </div>
            

          <!--Isi -->
          <!--Kalau tidak ada db-->
          @if($have_db==0)
          <div style="text-align: center;">
            <h1 style="padding-top: 250px;padding-bottom:250px">No db</h1>
          </div>  
          @endif


          <!--Kalau ada db-->
          @if($have_db==1)
          <form action="/cosben" method="post">
            @csrf
            


            <div class="row">
              <div class="col" >
                @foreach($data_header as $kriteria)
                <h2 id="namakriteria">{{$kriteria}}</h2>
                <input name="nama_kriteria[]" value="{{$kriteria}}" type="hidden">
                @endforeach
  
              </div>
              <div class="col" >
                @foreach($cosben as $cosbens)
                <select class="form-select form-control" aria-label="Default select example" id="cosbenkriteria" name="cosbenkriteria[]" >
                  <option hidden selected="{{$cosbens}}">{{$cosbens}}</option>
                  <option value="Cos">Cos</option>
                  <option value="Ben">Ben</option>
                </select>
                @endforeach
              </div>
              <div class="col" >
                @foreach($bobot as $bobot)
                <select class="form-select" aria-label="Default select example" id="bobotkriteria" name="bobotkriteria[]" >
                  <option hidden selected="selected">{{$bobot}}</option>
                  <option value=1>1</option>
                  <option value=2>2</option>
                  <option value=3>3</option>
                  <option value=4>4</option>
                  <option value=5>5</option>
                </select>
                @endforeach
              </div>

              
              <div class="col" >
                @foreach($pilih as $pilihs)
                <select class="form-select" aria-label="Default select example" id="pilihkriteria" name="choosekriteria[]" >
                  <option hidden selected="selected">{{$pilihs}}</option>
                  <option value="Ya">Ya</option>
                  <option value="Tidak">Tidak</option>
                </select>
                @endforeach
              </div>

            </div>

            

            

            
            

            <button class="btn btn-primary " id="savecosben">Hitung</button>
          </form>
          
         
          
            
          
          @endif
          </div>
          
          
        

        <!--End-->
    
      </div>
    
            
    </div>
    
    
  </div>

</div>


@endsection