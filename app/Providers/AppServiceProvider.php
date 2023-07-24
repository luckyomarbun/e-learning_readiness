<?php

namespace App\Providers;


use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL as FacadesURL;
use Illuminate\Support\ServiceProvider;
use PharIo\Manifest\Url;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        FacadesURL::forceScheme('https');   
        Paginator::useBootstrap();
    }
}
