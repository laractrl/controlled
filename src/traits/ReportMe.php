<?php
namespace Controlled\traits;

use Throwable;

trait ReportMe {
    function report(Throwable $exception)
    {
        info('ReportMeTest');

        parent::report($exception);
    }
}