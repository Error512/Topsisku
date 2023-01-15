<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
	<form id="regis" action="/register" method="post">
		@csrf
		<div class="imgcontainer">
		  <img src="img/logo.png" alt="Avatar" class="avatar" width="75" height="200">
		</div>
	  
		<div class="container">
		  <label for="name"><b>Name</b></label>
		  <input type="text" placeholder="Enter Username" name="name" class="form-control rounded-top rounded-bottom 
		  @error('name')is-invalid @enderror " value="{{old('name')}}">
		  @error('name')
		  <div class="invalid-feedback">
			{{$message}}
		  </div>
		  @enderror

	  
          <label for="email"><b>Email</b></label>
		  <input type="email" placeholder="Enter Username" name="email" class="form-control rounded-top rounded-bottom 
		  @error('email')is-invalid @enderror" value="{{old('email')}}">
		  @error('email')
		  <div class="invalid-feedback">
			{{$message}}
		  </div>
		  @enderror

	  

		  <label for="password"><b>Password</b></label>
		  <input type="password" placeholder="Enter Password" name="password" class="form-control rounded-top rounded-bottom 
		  @error('password')is-invalid @enderror" >
		  @error('password')
		  <div class="invalid-feedback">
			{{$message}}
		  </div>
		  @enderror
	  
       
		  <button type="submit">Register</button>
	
		  <span class="login">Already <a href="{{ url('login') }}">have account</a></span>
		</div>
	
	  </form>
	
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>