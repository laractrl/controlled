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
