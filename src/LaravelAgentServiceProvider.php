<?php

namespace Spinzar\LaravelAgent;

use Illuminate\Support\LaravelServiceProvider;

class LaravelAgentServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('laravelagent', function ($app) {
            return new LaravelAgent($app['request']->server());
        });

        $this->app->alias('laravelagent', LaravelAgent::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravelagent', laravelAgent::class];
    }
}
