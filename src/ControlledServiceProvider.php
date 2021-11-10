<?php

namespace Controlled;

use Controlled\commands\ControlledUp;
use Controlled\Middleware\ControlledMiddleware;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Http\Kernel;

class ControlledServiceProvider extends ServiceProvider{

    public function boot(Kernel $kernel)
    {

        $this->loadRoutesFrom(__DIR__.'/../routes/controlled.php');

        if ($this->app->runningInConsole()) {
            $this->commands([
                ControlledUp::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'controlled');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/controlled'),
            __DIR__.'/../config/controlled.php' => config_path('controlled.php'),
        ], 'controlled');

        $kernel->pushMiddleware(ControlledMiddleware::class);

        $this->app->before(function ($request)
        {
            info('req');
        });
    }
} 