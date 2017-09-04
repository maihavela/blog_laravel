<div class="form-group">
	{!! Form::label('title', 'Title') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>	

<div class="form-group">
	{!! Form::label('body', 'Body') !!}
	{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>	

<div class="form-group">
	{!! Form::label('published_at', 'Publish On:') !!}
	{!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<!-- <div class="form-group"> -->
<!-- 	{!! Form::label('street_name', 'Address:') !!} -->
<!-- 	{!! Form::input('text', 'street_name', null, ['class' => 'form-control street-control']) !!} -->
<!-- </div>	 -->

<div class="form-group">
	{!! Form::label('tag_list', 'Tags:') !!}
	{!! Form::select('tag_list[]', $tags, null, ['class' => 'form-control', 'multiple']) !!} 
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

<!--@section('footer') -->
<!--	<script type="text/javascript">  -->
<!--  		$('#tag_list').select2(); -->
<!--	</script> -->
<!--@endsection -->