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

function appIp()
{
    return request()->server('SERVER_ADDR', $_SERVER['SERVER_ADDR'] ?? null);
}