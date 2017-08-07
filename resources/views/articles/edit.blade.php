@extends('app')

@section('content')

	<h1>Edit: {{ $article->title }}</h1>
	
	<!-- 	//MODEL BINDING -- PARA AUTOCOMPLETAR EL CODIGO DEL FORM -->
	<!--  	{!! Form::model($article, (['method' => 'PATCH', 'url' => 'articles/' . $article->id])) !!}  -->
	<!--{!! Form::open(['method' => 'PATCH', 'url' => ['ArticlesController@update', $article->id]]) !!} -->
	
	{!! Form::open(['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}
		@include ('articles.form', ['submitButtonText' => 'Update Article'])				
	{!! Form::close() !!} 

@stop