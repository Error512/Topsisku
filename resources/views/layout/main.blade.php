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
           
            <div class="d-flex" id="nav">
                <ul>
                    <h3 class="mx-auto">
                      {{auth()->user()->name}}
                    </h3>
                </ul>
                <ul>

                    

            <!--<a href="{{ url('/') }}" class="btn btn-danger btn-lg active " role="button" aria-pressed="true">Logout</a> -->

            <form action="/logout" method="post">
              @csrf
              <button type="submit" class="btn btn-danger btn-lg active ">Logout</button>
            </form>
                </ul>

            </div>
          </div>
        </div>
      </nav>
        <!-- Navbar content -->
      </nav>



    @yield('content')
	
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

 <!-- Core theme JS-->
 <script src="js/scripts.js"></script>
</body>

</html>