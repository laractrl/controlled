<?php

namespace Controlled\Facades;

use Controlled\LaraApp as ControlledLaraApp;
use Illuminate\Support\Facades\Facade;

class LaraApp extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ControlledLaraApp::class;
    }
}
