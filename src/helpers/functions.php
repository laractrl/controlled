<?php

/**
 * get App Domain
 *
 * @return void
 */

if (function_exists('appDomain')) {
    return;
} else {
    function appDomain()
    {
        return request()->getHost();
    }
}

if (function_exists('appIP')) {
    return;
} else {
    function appIP()
    {
        return request()->server('SERVER_ADDR', $_SERVER['SERVER_ADDR'] ?? null);
    }
}

function redirectTo($url)
{
    return redirect($url);
}
