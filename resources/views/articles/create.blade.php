@extends('app')

@section('content')
	<h1>Write a New Article</h1>
	
	<hr/>
	{!! Form::open(['url' => 'articles']) !!}
		@include ('articles.form', ['submitButtonText' => 'Add Article'])				
	{!! Form::close() !!} 
	
	@include ('errors.list')
@stop

@section('javascript')
<script type="text/javascript"></script>	
<script src="../js/View.js" type="text/javascript"></script> 
<script src="../js/InputController.js" type="text/javascript"></script> 
<script src="../js/index.js" type="text/javascript"></script> 

@stop
