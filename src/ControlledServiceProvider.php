<?php

namespace Controlled;

use Controlled\commands\ControlledUp;
use Controlled\Middleware\ControlledMiddleware;
use Exception;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\Facades\App;

class ControlledServiceProvider extends ServiceProvider{

    public function boot(Kernel $kernel)
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/controlled.php');

        if ($this->app->runningInConsole()) {
            $this->commands([
                ControlledUp::class,
            ]);
        }

        $this->app->singleton(
            Illuminate\Contracts\Debug\ExceptionHandler::class,
            Controlled\Exceptions\ExceptionApp::class
        );

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'controlled');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/controlled'),
            __DIR__.'/../config/controlled.php' => config_path('controlled.php'),
        ], 'controlled');

        $kernel->pushMiddleware(ControlledMiddleware::class);
    }
} 