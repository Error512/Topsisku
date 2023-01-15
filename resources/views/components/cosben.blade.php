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

          <div class="column left" >
            <h2 id="middle">Nama Kriteria</h2>
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

    </div>

    </div>

            
    </div>
    
    
</div>

</div>


@endsection