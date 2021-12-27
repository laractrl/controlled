<?php

namespace Controlled\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class ExceptionApp extends ExceptionHandler{
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            info('event of lisener Exceptions : ' . $e->getMessage());
        });
    }
}