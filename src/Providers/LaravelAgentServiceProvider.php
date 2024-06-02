<?php

namespace Spinzar\LaravelAgent\Providers;

use Illuminate\Support\ServiceProvider;
use Spinzar\LaravelAgent\Services\LaravelAgent;

class LaravelAgentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('laravelagent', function ($app) {
            return new LaravelAgent($app['request']->server());
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravelagent'];
    }
}
