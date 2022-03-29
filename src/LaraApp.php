<?php

namespace Controlled;

class LaraApp
{    
    /**
     * Laravel App Status
     *
     * @param  boolean $local check locally or remotely
     * @return boolean
     */
    public function status($locally = true)
    {
        return $locally ? Handle::localChecker() : Handle::serverChecker();
    }
}
