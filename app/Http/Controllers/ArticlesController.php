<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
	public function index()
	{
		/*Obtein logged user*/
		//return \Auth::user()->name;
		
		//$articles = Article::all();
		
		$articles = Article::latest('published_at')->published()->get();
		
		//$articles = Article::latest()->get();
		
		return view ('articles.index', compact('articles'));
	}
	
	public function show($id)
	{
		$article = Article::findOrFail($id);
		
		//dd($article->published_at);
		
		//     	return $article;
		
		if (is_null($article))
		{
			abort(404);
		}
		return view('articles.show', compact('article')); //compact() is not a Laravel function. It is a PHP function. It creates an array containing variables and their values.
	}
	
	public function create()
	{
		return view('articles.create');
	}
	
	public function store(ArticleRequest $request)
	{
// 		$input = Request::all(); //me devuelve todo los datos que ingrese
// 		//si quiere obtener un solo parametro $input = Request::get('title');
		
// 		Article::create($input);

//		Article::create(Request::all());

		// 		$this->validate($request, ['title' => 'required|min:3',
		// 								  'body' => 'required',
		// 								  'published_at' => 'required|date']);
		
		$article = new Article($request->all());
		
		//Auth::user()->articles(); //Con esto obtener a Collection
		Auth::user()->articles()->save($article);	//user_id => Auth::id()
		
		//Article::create($request->all());		
		
		return redirect('articles');
		//return \Redirect::route('contact')
		//      ->with('message', 'Thanks for contacting us!');
	}
	
	public function edit($id)
	{
		$article = Article::findOrFail($id);
		
		return view('articles.edit', compact('article'));
	}
	
	public function update($id, ArticleRequest $request)
	{
		$article = Article::findOrFail($id);
		
		$article->update($request->all());
		
		return redirect('articles');
	}
}
