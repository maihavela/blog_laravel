const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
//    mix.sass('app.scss')
//       //.webpack('app.js')
//       .coffee('module.coffee');
//    
//    mix.styles([
//    	'vendor/normalize.css',
//    	'app.css'
//    ], 'public/output/final.css', 'public/css');
//    
//    mix.scripts([
//    	'vendor/jquery.js',
//    	'main.js',
//    	'coupon.js'
//    ], 'public/output/final.css', 'public/js')
	
//	mix.phpUnit().phpSpec();
	
	mix.sass('app.scss');
	
	mix.styles(['vendor/normalize.css', 'app.css'], null, 'public/css');
	
	mix.version('public/css/all.css');
});
