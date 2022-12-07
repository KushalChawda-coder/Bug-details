<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>Document</title>

	<!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
  <script  src="{{asset('js/JavaScript.js')}}"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">
    	<img src="https://cdn-icons-png.flaticon.com/512/785/785104.png" jsaction="load:XAeZkd;" jsname="HiaYvf" class="n3VNCb KAlRDb" alt="Bug - Free animals icons" data-noaft="1" style="width: 43px; height: 43px; ">
       &nbsp Bug report </a>
     <form class="d-flex" role="search">
     	@if(session()->has('login_status'))
	      <span class="navbar-text" style="padding-right: 10px;">
	        hi , {{ Session::get('name') }}
	      </span>
        <a href="/logout" class="btn btn-outline-success" ><i class="fa-solid fa-right-to-bracket"></i> Log out</a>
        @else
         <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-right-to-bracket"></i> Log in</button>
         @endif
      </form>
    </div>
  </div>
</nav>
		@yield('content')
	</div>
</body>
</html>