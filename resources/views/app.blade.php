<!DOCTYPE>
<html>

<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/app.css">
</head>

<body>
	<div class="container">
		
<!-- 		el if chequea si esta ese mensaje 
			con get obtengo el valor de esa key-->
		
		@if (Session::has('flash_message'))
			<div class="alert alert-success">{{ Session::get('flash_message') }}</div>
		@endif
		
		@yield('content')
	</div>
	
<!-- 	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script> -->
<!--     <script src="http://servicios.usig.buenosaires.gob.ar/nd-js/1.4/normalizadorDirecciones.min.js" type="text/javascript"></script> -->
<!--     @yield('javascript') -->
</body>

</html>