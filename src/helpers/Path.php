<?php

namespace Controlled\helpers;

/**
 * Path, have the functions of get the path
 */
class Path
{
    /**
     * get Data Key
     *
     * @return string
     */
    public static function getDataKey()
    {
        return base_path('tests\data.key');
    }

    /**
     * get Test Key
     *
     * @return string
     */
    public static function getTestKey()
    {
        return base_path('tests/test.key');
    }

    /**
     * getGitignore
     *
     * @return string
     */
    public static function getGitignore()
    {
        return base_path('tests/.gitignore');
    }
}
