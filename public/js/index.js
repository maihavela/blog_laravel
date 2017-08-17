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