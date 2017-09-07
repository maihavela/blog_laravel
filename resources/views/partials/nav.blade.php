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
		          <li>{{!! link_to_action('ArticlesController@show', $latest->title, [$latest->id]) !!}}</li>
		        </ul>   
		    </div>
		 </div>
	 </nav>