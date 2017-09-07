<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
	/**
	 * Create a new article controller instance.
	 */
	public function __construct(){
		/** 1.MIDDLEWARE
		 * auth referencia al auth dentro de 
		 * Http->Requests->Kernel->$routeMiddleware
		 * Lo que dice es que quiere disparar el middleware de authenticate
		 */
		$this->middleware('auth', ['except' => 'index']); 
	}
	public function index()
	{
		/*Obtein logged user*/
		//return \Auth::user()->name;
		
		//$articles = Article::all();
		/**
		 * fetch the latest articles
		 * @var unknown $articles
		 */
		$articles = Article::latest('published_at')->published()->get();
		
		return view('articles.index', compact('articles'));
	}
	
	public function show(Article $article)
	{
		//$article = Article::findOrFail($id);  No lo busco mas por id, uso route model binding
		
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
		/*Estableciendo permisos para crear articulo nuevo*/
/* 		if (Auth::guest()){
			return redirect('articles');
		} */
		
		/**
		 * Select tags for the dropdown menu
		 * @var unknown $tags
		 */
		$tags = Tag::pluck('name', 'id')->all();
		
		return view('articles.create', compact('tags'));
	}
	
	public function store(ArticleRequest $request)
	{
		//dd($request->input('tags'));

		//$articles->tags()->attach([1, 2, 3, 4]);
// 		$input = Request::all(); //me devuelve todo los datos que ingrese
// 		//si quiere obtener un solo parametro $input = Request::get('title');
		
// 		Article::create($input);

//		Article::create(Request::all());

		// 		$this->validate($request, ['title' => 'required|min:3',
		// 								  'body' => 'required',
		// 								  'published_at' => 'required|date']);
		
// 		$article = new Article($request->all());
		
// 		//Auth::user()->articles(); //Con esto obtener a Collection
// 		Auth::user()->articles()->save($article);	//user_id => Auth::id()
		
		//Article::create($request->all());		

		$this->createArticle($request);
		//$tagIds = $request->input('tags');
		//dd('Tags', $tagIds);
		
		
		//attach: add new rows
		//detach: remove row
		//sync: 
		
		/**
		 * flash = temporary, 1 request
		 * put = no temp
		 */

		/***
		 * \Session::flash('flash_message', 'Your article has been created!');
		 * Dos formas de hacer session flash message
		 */

		//session()->flash('flash_message', 'Your article has been created!');
		//session()->flash('flash_message_important', true);
		// Dos formas de hacer lo mismo
 		return redirect('articles')->with([
 				'flash_message' => 'Your article has been created!',
 				'flash_message_important'=> true
 		]);
		//return \Redirect::route('contact')
		//      ->with('message', 'Thanks for contacting us!');
		
		// \Flash::success() . Es posible usarla de las dos formas flash() o \Flash::
		//flash('Your article has been created!')->important();
		//session()->flash('flash_message', 'Your article has been created!');
		//return redirect('articles');
	}
	
	/**
	 * 
	 * @param Article $article
	 * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
	 */
	public function edit(Article $article)
	{
		//$article = Article::findOrFail($id);
		$tags = Tag::pluck('name', 'id')->all();
		
		
		return view('articles.edit', compact('article', 'tags'));
	}
	
	/**
	 * 
	 * @param Article $article
	 * @param ArticleRequest $request = is to validate 
	 * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
	 */
	
	public function update(ArticleRequest $request, Article $article)
	{
		//$article = Article::findOrFail($id);
		
		$article->update($request->all());
		
		$article->syncTags($request->input('tag_list'));
				
		return redirect('articles');
	}
	
	/**
	 * Sync up the list of tags in the database.
	 */
	private function syncTags(Article $article, array $tags)
	{
		$article->tags()->sync($tags);
	}
	
	/***
	 * Create and persist a new article.
	 * @param ArticleRequest $request
	 * @return unknown
	 */
	private function createArticle(ArticleRequest $request)
	{
		$article = Auth::user()->articles()->create($request->all());
		
		$this->syncTags($article, $request->input('tag_list'));
		
		return $article;
	}
}

/***
 * fetch the same data to pass to every single view
