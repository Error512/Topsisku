@extends('layout.main')
@section('content')
<div id="positiontables">
    <div id="tittleproject">
      
        <h1 >My Project</h1>
        
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="addproject">
            Add Project
          </button>


          <!-- GAMBAR ga jadi
        <a href="#" >
            <img src="img/add.png" width="50" height="50" alt="" id="addimg">
        </a>
    -->
    
    </div>
    
    

    <div class="container" id="insideproject">
      <!--ISI DARI CONTAINER-->
      <div class="row">
      @foreach ($posts as $post)
 
      
        <div class="col-sm-4">
          <div class="card" style="margin-top: 25px;">
            <div class="card-body">
              <h5 class="card-title" style="text-align: center;">{{$post->nama_project}}</h5>
          <br>
          <br>

          
          <div class="flex">
            <div>
              <form action="/projects/db/{{$post->id}}" method="put">
              <input name="last_project" value="{{$post->id}}" type="hidden">
              <button class="btn btn-primary col-lg-15">Use This Project</button>
              </form>






            </div>
            <div>
              <form action="/projects/{{$post->id}}" method="post">
                @method('delete')
                @csrf
                <button class="btn btn-danger col-lg-16" style="margin-left:50px">Delete</button>
    
              </form>
            </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach


   
    
    </div>
</div>



<!--Modal-->

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Project</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/projects" method="post">
            @csrf

            <input name="user_id" value="{{auth()->user()->id}}" type="hidden">



            <label for="nama_project"><b>Name Project</b></label>
		  <input type="text" placeholder="Enter Project Name" name="nama_project" required class="form-control rounded-top rounded-bottom
		  @error('nama_project')is-invalid @enderror" value="{{old('nama_project')}}">
		  @error('nama_project')
		  <div class="invalid-feedback">
			{{$message}}
		  </div>
		  @enderror


          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>



          </form>
        </div>
        
      </div>
    </div>
  </div>
    
</div>
@endsection