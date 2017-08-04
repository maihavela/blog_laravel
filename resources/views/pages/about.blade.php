@extends('app')

@section('content')

<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Insert title here</title>
	</head>
	<body>
		<h1>About me: {{ $first }} {{ $last }} </h1>
	</body>
</html>

@stop