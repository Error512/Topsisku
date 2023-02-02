@extends('layout.full')
@section('content')
<div id="page-content-wrapper">
    <!-- Page content-->
    <div class="container-fluid" >
        <br>
        <br>
        <br>
        <!--Nanti diganti sesuai judul projectnya-->
        @foreach ($posts as $post)
        <h1 class="mt-4"  style="text-align: center;">{{$post->nama_project}}</h1>
        
        @endforeach

        
        

        
        @if($have_db ==0)
        
        <form action="/projects/db/{{auth()->user()->last_project}}" method="post" enctype="multipart/form-data" style="margin-left: 23%;

            margin-top: 100px;">
        @csrf

        <div class="container-fluid">
            <div class="mb-2">
                <label for="csv" class="form-label">Upload CSV</label>
                <input class="form-control" type="file" id="csv" name="csv" style="width:300px;" >
            </div>
            
            <button style="width:300px;" class="btn btn-success">click</button>

        </div>

        </form>
        @endif


        @if($have_db >0)
        <form action="/projects/delete" method="post">
            @csrf
            <input name="project_id" value="{{$post}}" type="hidden">
            <button style="width:300px; margin-left: 62%;

            margin-top: 160px;" class="btn btn-danger">Delete</button>
        </form>
        </div>
        @endif

        <br>
        <div class="container-fluid " id="dbbox">
        </div>
        

       
    
       
     

        
        
    </div>
    
</div>
   
@endsection