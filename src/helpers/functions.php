<?php

/**
 * get App Domain
 *
 * @return void
 */
function appDomain()
{
    return request()->getHost();
}

function appIP()
{
    return request()->server('SERVER_ADDR', $_SERVER['SERVER_ADDR'] ?? null);
}

function redirectTo($url)
{
    return redirect($url);
}
