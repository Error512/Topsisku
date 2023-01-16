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
          <form action="/addproject" method="post">
            @csrf

            <input name="id_user" value="{{auth()->user()->id}}" type="hidden">



            <label for="nama_project"><b>Name Project</b></label>
		  <input type="text" placeholder="Enter Project Name" name="nama_project" class="form-control rounded-top rounded-bottom 
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