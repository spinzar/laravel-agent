<?php

namespace Spinzar\LaravelAgent\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelAgent extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravelagent';
    }
}
