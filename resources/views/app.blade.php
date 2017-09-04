<!DOCTYPE>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/app.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css"/>
</head>

<body>
	view-source:http://getbootstrap.com/docs/4.0/examples/starter-template/
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="sr-only">Toogle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			    </button>
      			<a class="navbar-brand" href="/">Blog</a>
      		</div>
      		
      	    <div class="collapse navbar-collapse" id="navbar">
		        <ul class="nav navbar-nav">
		          <li><a href="/articles">Articles</a></li>
		        </ul>  
		        
		        <ul class="nav navbar-nav navbar-right">
		          <li>{!! link_to_action('ArticlesController@show', $latest->title, [$latest->id]) !!}</li>
		        </ul>   
		    </div>
		 </div>
	 </nav>
	<div class="container">
 		@include('partials.flash') 		
		<!-- Usar el icono de x para remover el message -->			
		@yield('content')
	</div>
	
	<script src="http://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
	
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

	@yield('footer')
<!-- 	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script> -->
<!--     <script src="http://servicios.usig.buenosaires.gob.ar/nd-js/1.4/normalizadorDirecciones.min.js" type="text/javascript"></script> -->
<!--     @yield('javascript') -->
</body>
</html>