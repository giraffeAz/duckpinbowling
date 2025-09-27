<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>TDBMS - @yield('title')</title>

	<!--logo-->
	<link rel="shortcut icon" href="{{ url('images/modernlogo.ico') }}">

	<!--Bootstrap CSS-->

	<link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">

	<!---Styles---->
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

		
	@stack('stylesheets')

	
</head>
<body class="loginbody"> 
	<!-- Content Page -->
	@yield('content')

    @stack('scripts')

	<script src="{{ asset('bootsrap/js/bootstrap.bundle.min.js') }}" type="type/javascript" ></script>
	<script src="{{ asset('boostrap/js/main.js')}}"></script>
</body>
</html>