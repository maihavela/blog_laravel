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
<script type="text/javascript">
	//creacion de la view
View = (function($) {
	return function (idField) {
		//idField: street_name
		var $field = $('#'+idField);
		console.log('Input:', $field);
		console.log('Form:', $field.closest('form'));
		if (!$field) {
			return 0;
		} else {
			//closest:get the first element that matches the selector by testing the element itself and traversing up through its ancestors in the DOM tree.
			$field.closest('form').after('<div id="suggestions"></div>');	
		}
		
		this.show = function(opts, limit) {
	        if (opts instanceof Array) {
	        	console.log('opts:', opts);
	    		if (opts.length > 0) {
	                var ul = '<p>Sugerencias:</p><ul>';
	    			if (opts.length == limit)
	    				opts.push({ toString: function() { return 'etc';} });
	    			for(var op=0;op<opts.length;op++) {
	    				ul += '<li>'+opts[op].toString()+'</li>';
	    			}
	    			ul+='</ul>';
	    			$('#suggestions').html(ul);
	    		} else {
	    			$('#suggestions').html('No se hallaron sugerencias.');
	    		}
	        }
		}
		
		this.showError = function(error) {
	        $('#suggestions').html(error.toString());		
		}
		
		this.clean = function() {
			$('#suggestions').html('');
		}
	};
})(jQuery);
//Definicion del namespace InputController
if (typeof (usig) == "undefined")
	usig = {};

usig.InputController = function(idField, callback, opts) {
	var changeCallback = callback;
	var field = document.getElementById(idField);
	var myself = this;
	
	if (!field) {
		return 0;
	} else {
		field.onkeyup = function(ev) { return myself.onKeyUp(ev); };	
	}
	
	this.onKeyUp = function(ev) {
		var key = (window.event) ? window.event.keyCode : ev.keyCode;
		if (typeof(changeCallback) == "function") {
			changeCallback(key, field.value);
		}
	}
}
//index.js
$.noConflict();
jQuery(document).ready(function($) {
	var v = new View('street_name');
	console.log('View:', v);
	var n = usig.NormalizadorDirecciones.init({
		lazyDataLoad: false,
		aceptarCallesSinAlturas: true,
		callesEnMinusculas: true 
	});
	var ic = new usig.InputController('street_name', function(key, newValue) {
		console.log('InputController:', newValue);
		if (newValue!='') {
			try {
    			var opts = n.normalizar(newValue, 10);
    			console.log('InputController opts:', opts);
                v.show(opts, 10);
			} catch (error) {
				try {
					opts = n.buscarDireccion(newValue);
					if (opts!==false)
						v.show([opts.match], 2);
					else
						v.showError(error);
				}catch(error){
    				v.showError(error);
				}
			}
		} else {
			v.clean();
		}
	});
});
</script>		
@stop
