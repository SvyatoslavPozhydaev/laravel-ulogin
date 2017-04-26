<?php namespace Ulogin\Modulse;

use Illuminate\Support\ServiceProvider as LServiceProvider;
use Illuminate\Support\Facades\Schema;

class ServiceProvider extends LServiceProvider {

    public function boot()
    {
        Schema::defaultStringLength(191);

        if (! $this->app->routesAreCached()) {
            include __DIR__ . '/routes.php';
        }

        $this->publishes([__DIR__ . '/../config/' => config_path() . "/"], 'config');
        $this->publishes([__DIR__ . '/../public/' => public_path() . "/vendor/ulogin/"], 'assets');
        $this->publishes([__DIR__ . '/../database/' => base_path("database")], 'database');

        $this->loadViewsFrom(__DIR__.'/../views', 'ulogin');

    }

    public function register()
    {

    }

}