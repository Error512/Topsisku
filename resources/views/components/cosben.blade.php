@extends('layout.full')
@section('content')



<div class="container-fluid" >
    <br>
    <br>
    <br>
    <!--Nanti diganti sesuai judul projectnya-->
    
    <div class="container-fluid">

   

    </div>
    

    
    <br>
    @if($have_db==1)
    <form action="#">
      @csrf
      <button class="btn btn-primary " id="savecosben">Save</button>
    </form>
    @endif
    <div class="container-fluid " id="cosbenbox">
        <br>
        <div class="row">
            
            <div class="column left" >
              <h2 id="middle">Kriteria</h2>
            </div>
            <div class="column left" >
                <h2 id="middle">Cos/Ben</h2>
              </div>
              <div class="column left" >
                <h2 id="middle">Bobot</h2>
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
          @foreach($data_header as $kriteria)
          <div class="column left" >
            <h2 id="middle">{{$kriteria}}</h2>
          </div>

          <div class="column mid" >

            <select class="form-select" aria-label="Default select example">

                <option value="1">Cos</option>
                <option value="2">Ben</option>

              </select>
          </div>

          <div class="column mid" >

            <select class="form-select" aria-label="Default select example">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="2">4</option>
                <option value="3">5</option>
              </select>
          </div>

         
          @endforeach
            
          
          @endif
          
    </div>

    
    
    </div>
    
            
    </div>
    
    
</div>

</div>


@endsection