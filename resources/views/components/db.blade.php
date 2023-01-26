@extends('layout.full')
@section('content')
<div id="page-content-wrapper">
    <!-- Page content-->
    <div class="container-fluid" >
        <br>
        <br>
        <br>
        <!--Nanti diganti sesuai judul projectnya-->
        <h1 class="mt-4"  style="text-align: center;">{{$posts->nama_project}}</h1>

        
        <div class="container-fluid">
            <a href="#" id="removeimg">
                <img src="img/remove.png" width="70" height="70" alt="" id="removeimg" >
            </a>

            <a href="#" id="addimg">
                <img src="img/upload.png" width="70" height="70" alt="" id="addimg" >
            </a>
            

        </div>
        

        

        <br>
        <div class="container-fluid " id="dbbox">
        </div>
        
    </div>
    
</div>
   
@endsection