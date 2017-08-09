# blog_laravel

COSAS APRENDIDAS

1)MODELS

	DENTRO DEL MODELO: ARTICLES
		1. MASSIVE ASSIGNMENT: protected  $fillable
		2. Manejar las fechas
		3. QUERY SCOPES: scopeunPublished
		4. Set + Name of the property + the word 'Attribute': setPublishedAtAttribute
2)CONTROLLERS

		1.MIDDLEWARE: $this->middleware('auth', ['except' => 'index']);
			Protect the page from unauthenticated users.
		2.CONTROLLERS: Receive some request, delegate to get the request done and return the response.		
			2.1 ArticlesController:
				/store:
					Auth::user()->articles()->save($article); --> Get the authenticated users (Auth::user()), get all the articles and save a new one.
				/edit
				/store
				/show
				/create
				/update
		3. Two ways to validate data:
			3.1 public function store(ArticleRequest $request) to validate the request or the form data against the rules() method, inside the ArticleRequest (Requests --> use App\Http\Requests\ArticleRequest;). 	If it fails--> redirect to errors -> list.blade. 
				If it passes, redirect to 'articles'.
			3.2 Also, It is posible to validate inside the store() method directly:
				$this->validate($request, ['title' => 'required|min:3',
			 				'body' => 'required',
			 				'published_at' => 'required|date']);

4. Templating BLADE

5. ENVIRONMENT:  

		-env file:
			APP_ENV=local
			APP_KEY=base64:8ntLTNes8CHCGdl7IpF6b6Op1YgswuQLjV5vE2mR1n8=
			APP_DEBUG=true /*TO PRODUCTION , SET TO FALSE*/
			APP_LOG_LEVEL=debug
			APP_URL=http://localhost
		-config->app: 
			'debug' => env('APP_DEBUG', false),
6. Database MIGRATION: 

	-database -> migrations: Define the schema and then 'php artisan migrate'
	-CreateArticlesTable: A foreign key (user_id) reference the id of user table.
		 -public function up(): If I need to modify something. Add an extra field.
		 -public function down(): rollback the migration. what to do in reverse.
7. PARTIALS

-Articles/create. 

	7.1 Clean a view. Master page (app.blade) and then every view will extend of it @extends('app'). Dont copy and paste.
	7.2 A clean form. So, we dont have to write the some code on the views->articles->create and views->articles->edit. We extracted the form from a partial (form.blade.php) and the and every view we inlcuded the diferences, could be the name of the button (@include the partial --> @include ('articles.form') and then the button name (['submitButtonText' => 'Add Article']))
	7.3 The same thing with the errors.list to show errors completing the form . We extract in a partial and then include it. 
	
8. PROVIDERS:

	Building blocks of laravel. Slipt up in a little component that define how to build up or bootstrap that component.
	Define how to bootstrap a Routing app, the RouteServiceProvider will be a good place.
	-Model Binding: Instead of receive an ID, now we receive the model (Article). In the previous versions, we set up things inside routeServiceProvider, but now it is not necessary.