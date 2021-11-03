<?php

namespace Controlled;

class Handle
{
    static public function opned()
    {
        file_put_contents(base_path('tests\data.key'), "A");

        return true;
    }

    static public function loked()
    {
        file_put_contents(base_path('tests\data.key'), "L");

        return true;
    }
}