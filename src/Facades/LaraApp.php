<?php

namespace Controlled\Facades;

use Illuminate\Support\Facades\Facade;

class LaraApp extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'LaraApp';
    }
}
