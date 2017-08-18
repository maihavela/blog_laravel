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
 		@include('partials.flash') 
		
		<!-- Usar el icono de x para remover el message -->
			
		@yield('content')
	</div>
	
	<script src="http://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
<!-- 	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script> -->
<!--     <script src="http://servicios.usig.buenosaires.gob.ar/nd-js/1.4/normalizadorDirecciones.min.js" type="text/javascript"></script> -->
<!--     @yield('javascript') -->
</body>

</html>