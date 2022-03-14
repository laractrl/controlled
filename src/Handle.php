<?php

namespace Controlled;

use Controlled\helpers\Path;
use Controlled\Http\Request\Handler;

/**
 * Handler, have the main functions
 */
class Handle
{
    /**
     * open
     *
     * @return boolean
     */
    public static function open()
    {
        file_put_contents(Path::getDataKey(), "A");
        return true;
    }

    /**
     * close
     *
     * @param  string $code
     * @param  string $message
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public static function close($code = "", $message = "")
    {
        file_put_contents(Path::getDataKey(), "L");
        return redirect(route('closed', ['code' => $code, 'message' => $message]));
    }

    /**
     * status
     *
     * @return boolean
     */
    public static function status()
    {
        $data = file_get_contents(Path::getDataKey());
        return $data == "A";
    }

    /**
     * localChecker
     *
     * @return boolean
     */
    public static function localChecker()
    {
        return static::status();
    }

    /**
     * serverChecker
     *
     * @return \Illuminate\Http\Client\Response
     */
    public static function serverChecker()
    {
        $httpHandler = new Handler();
        return $httpHandler->verifie();
    }

    /**
     * checkPassedUrl
     *
     * @param  mixed $url
     * @return boolean
     */
    public static function checkPassedUrl($url)
    {
        return $url == '/closed' or $url == '/test/confirme';
    }

    /**
     * checkFiles
     *
     * @return boolean
     */
    public static function checkFiles()
    {
        if (!file_exists(Path::getDataKey())) {
            return false;
        }

        if (!file_exists(Path::getDataKey())) {
            return false;
        }

        return true;
    }
}
