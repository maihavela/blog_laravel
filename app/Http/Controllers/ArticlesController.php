<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Controllers;
use Request;


class ArticlesController extends Controller
{
	public function index(){
		
		$articles = Article::all();
		$articles = Article::latest('published_at')->published()->get();
		//$articles = Article::latest()->get();
		
		return view ('articles.index', compact('articles'));
	}
	
	public function show($id){
		$article = Article::findOrFail($id);
		
		//dd($article->published_at);
		
		//     	return $article;
		if (is_null($article)){
			abort(404);
		}
		return view('articles.show', compact('article')); //compact() is not a Laravel function. It is a PHP function. It creates an array containing variables and their values.
	}
	
	public function create(){
		return view('articles.create');
	}
	
	public function store(){
		$input = Request::all(); //me devuelve todo los datos que ingrese
		//si quiere obtener un solo parametro $input = Request::get('title');
		
		Article::create($input);
		
		
		return redirect('articles');
		//		return \Redirect::route('contact')
		//      ->with('message', 'Thanks for contacting us!');
	}
}
