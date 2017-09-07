<?php

namespace App\Providers;

use App\Article;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
		$this->composeNavigation();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    
    //Compose the nav bar
    private function composeNavigation(){
	    //View composers are callbacks or class methods that are called when a view is rendered.
	    view()->composer('partials.nav', function($view)
	    {
	    	$view->with('latest', Article::latest()->first());
	    });
    }
}
