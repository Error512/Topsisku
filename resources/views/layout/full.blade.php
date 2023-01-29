<!DOCTYPE html>
<html>
<head>
<title>Project</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/db.css') }}">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Topsisku</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
           
            <div class="d-flex gap-5" id="nav">
              
              
              <h2>{{auth()->user()->name}}</h2>
           

                  <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-lg active ">Logout</button>
                  </form>
      

            </div>
          </div>
        </div>
      </nav>
        <!-- Navbar content -->
      </nav>

      <div class="d-flex" id="wrapper" >
        <!-- Sidebar-->

        

        <div class="border-end " id="sidebar-wrapper" >
            <div class="list-group list-group-flush" >

              <nav>
                <li class="nav-item ">
                  <form action="/projects/db/{{auth()->user()->last_project}}" >
                    <input name="last_project" value="{{auth()->user()->last_project}}" type="hidden">
                    <button class="nav-link {{Request::is('projects/db*')? 'disabled':''}} list-group-item list-group-item-action list-group-item-primary p-4 ">Database</button>
                  </form>
                </li>
                <li class="nav-item ">
                  <a href="{{ url('cosben') }}" class="nav-link {{Request::is('cosben')? 'disabled':''}} list-group-item list-group-item-action list-group-item-primary p-4">
                    <span data-feather="home" class="align-text-bottom"></span>
                    cosben
                  </a>
                </li>
                <li class="nav-item ">
                  <a href="{{ url('hitung') }}" class="nav-link {{Request::is('hitung')? 'disabled':''}} list-group-item list-group-item-action list-group-item-primary p-4">
                    <span data-feather="home" class="align-text-bottom"></span>
                    hitung
                  </a>
                </li>
                <li class="nav-item ">
                  <a href="{{ url('/projects') }}" class="nav-link list-group-item list-group-item-action list-group-item-primary p-4">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Ganti Project
                  </a>
                </li>
              </nav>
                
            </div>



        </div>
        <!-- Page content wrapper-->
        @yield('content')
        
    </div>


	
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

 <!-- Core theme JS-->
 <script src="js/scripts.js"></script>
</body>

</html>