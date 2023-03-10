<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>



<body>

	
	<nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
		<div class="container px-5">
			<a class="navbar-brand fw-bold" href="/" style="margin-left: -30%">Topsisku</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			</button>
		</div>
	</nav>


<br>

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align:center">
	<h2 style="text-align: center">{{session('success')}}</h2>
	
  </div>
  @endif

  @if(session()->has('error_account'))
<div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align:center"> 
	{{session('error_account')}}
	
  </div>
  @endif

  

	<form id="login" action="/login" method="post">
		@csrf
		<div class="imgcontainer">
		  <img src="img/logo.png" alt="Avatar" class="avatar" width="75" height="200">
		</div>
	  
		<div class="container">
		  <label for="email"><b>Email</b></label>
		  <input type="text" placeholder="Enter Email" value="{{Session::get('email')}}" name="email" id="email" class="rounded-top rounded-bottom" required>
	  
		  <label for="password"><b>Password</b></label>
		  <input type="password" placeholder="Enter Password" name="password" id="password" class="rounded-top rounded-bottom" required>
	  
		  <button name="submit" type="submit" >Login</button>
	
		  <span class="login">Haven't <a href="{{ url('/register') }}">Register?</a></span>
		</div>
	
	  </form>
	
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>