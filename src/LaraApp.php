<?php

namespace Controlled;

class LaraApp
{
    private $result;

    public function __construct()
    {
        $this->result = 0;
    }

    public function test()
    {
        return $this->result;
    }
}