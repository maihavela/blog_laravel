<?php 
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Your own application, as well as all of Laravel's core services are bootstrapped via service providers.
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
        	'Illuminate\Contracts\Auth\Registrar',
        	'App\Services\Registrar'
        );
    }
}
