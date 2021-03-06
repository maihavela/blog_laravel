<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function(){
	return 'Home Page';
});

/* Route::get('about', ['middleware' => 'auth', 'uses' => 'PagesController@about']); */
/* Route::get('about', ['middleware' => 'auth', function()
{
	return 'this page will only show if the user is signed in';
}]); */

Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');

// Route::get('articles', 'ArticlesController@index');
// Route::get('articles/create', 'ArticlesController@create');
// Route::post('articles',['as' => 'articles_store', 'uses' => 'ArticlesController@store']);
// Route::get('articles/{id}', 'ArticlesController@show');
// Route::get('articles/{id}/edit', 'ArticlesController@edit');
//EN LUGAR DE PONER LO DE ARRIBA, LO CAMBIO POR UNA SOLA LINEA DE CODIGO
Route::resource('articles', 'ArticlesController');

/* Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]); */

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', 'WelcomeController@index');
// Route::get('contact', 'WelcomeController@contact');
//guardar nuevo articulo
//Route::post('articles', 'ArticlesController@store');
// Route::get('/',     'ArticlesController@store');
// Route::get('posts', 'ArticlesController@store');
// Route::post('/articles', array('as' => 'articles',
// 		'uses' => 'ArticlesController@store'));
/* Route::get('articles/{id}', function($id)
 {
 return 'article '.$id;
 }); */

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('foo', ['middleware' => 'manager', function()
{
	return 'la ven los managers';
}]);