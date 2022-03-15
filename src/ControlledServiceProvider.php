<?php

namespace Controlled;

use Controlled\commands\ControlledUp;
use Controlled\Middleware\ControlledMiddleware;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\Facades\App;

/**
 * Controlled Service Provider
 */
class ControlledServiceProvider extends ServiceProvider
{
    /**
     * boot
     *
     * @param  mixed $kernel
     * @return void
     */
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
    }

    public function register()
    {
        require_once'helpers/functions.php';
    }
}
