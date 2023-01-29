@extends('layout.full')
@section('content')
<div id="page-content-wrapper">
    <!-- Page content-->
    <div class="container-fluid" >
        <br>
        <br>
        <br>
        <!--Nanti diganti sesuai judul projectnya-->
        @foreach ($posts as $object)
        <h1 class="mt-4"  style="text-align: center;">{{$object->nama_project}}</h1>
        
        @endforeach


        <form action="/projects/db/{{auth()->user()->last_project}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="container-fluid">
            <div class="mb-2">
                <label for="csv" class="form-label">Upload CSV</label>
                <input class="form-control" type="file" id="csv" name="csv" style="width:300px;">
            </div>

            <button>click</button>

        </div>

        </form>
        
        
        

        

        <br>
        <div class="container-fluid " id="dbbox">
        </div>
        
    </div>
    
</div>
   
@endsection