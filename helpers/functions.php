<?php

if (!function_exists('appDomain')) {
    function appDomain()
    {
        return request()->getHost();
    }
}

if (!function_exists('appIP')) {
    function appIP()
    {
        return request()->server('SERVER_ADDR', $_SERVER['SERVER_ADDR'] ?? null);
    }
}

if (!function_exists('redirectTo')) {
    function redirectTo($url)
    {
        return redirect($url);
    }
}
