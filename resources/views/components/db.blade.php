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








        
        @if($have_db >0)

            <div class="container-fluid " id="showdb">
                <table>
                    <thead>
                        <tr id="dbtable">
                            @foreach ($data_header as $column)
                                <th style="text-align: center; padding: 10px;" id="dbtable">{{ $column }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < 10; $i++)
                            <tr id="dbtable">
                                @foreach ($data_value[$i] as $key => $value)
                                    <td style="text-align: center; padding: 4px;" id="dbtable">{{ $value }}</td>
                                @endforeach
                            </tr>
                        @endfor
                    </tbody>
                </table>
                
            </div>

            <h3 style="padding-top: 40px; padding-left: 180px">Only show top 10 data</h1>
        @endif









        @if($have_db == 0 )
        <div class="container-fluid " id="dbbox" style="text-align: center;">
            <h1 style="padding-top: 250px">No Database</h1>
        </div>
        @endif
        
        

       
        
       
     

        
        
    </div>
    
</div>
   
@endsection