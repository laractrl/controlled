<?php

namespace Controlled\traits;

use Throwable;

trait ReportMe
{
    public function report(Throwable $exception)
    {
        info('ReportMeTest');

        parent::report($exception);
    }
}
