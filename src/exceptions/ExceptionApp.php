<?php

namespace Controlled\Exceptions;

use App\Exceptions\Handler;
use Throwable;

class ExceptionApp extends Handler
{
    public function register()
    {
        parent::register();

        $this->reportable(function (Throwable $e) {
            info('event of lisener Exceptions : ' . $e->getMessage());
        });
    }
}
