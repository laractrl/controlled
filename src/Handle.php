<?php

namespace Controlled;

use Illuminate\Support\Facades\Http;

/**
 * Handler, have the main functions
 */
class Handle
{
    /**
     * opned
     *
     * @return void
     */
    public static function opned()
    {
        file_put_contents(base_path('tests\data.key'), "A");
        // info('Opned app');

        return true;
    }

    /**
     * loked
     *
     * @param  mixed $code
     * @param  mixed $message
     * @return void
     */
    public static function loked($code = "", $message = "")
    {
        file_put_contents(base_path('tests\data.key'), "L");
        // info('loked app');

        return redirect(route('locked', ['code' => $code,'message' => $message]));
    }

    /**
     * status
     *
     * @return void
     */
    public static function status()
    {
        // info('verifie status (local)');

        $data = file_get_contents(base_path('tests\data.key'));

        return $data == "A";
    }

    /**
     * verifie
     *
     * @param  mixed $local
     * @return void
     */
    public static function verifie($local = true)
    {
        if ($local) {
            return static::status();
        } elseif (!$local) {
            // info('verifie status (server)');

            $app_key = (file_get_contents(base_path('tests\test.key')));

            return Http::withHeaders([
                'app' => $app_key,
                'ip' => request()->server('SERVER_ADDR'),
                'domain' => request()->getHost()
            ])->get('https://laractrl.com/api/v1/verifie');
        }

        return false;
    }

    /**
     * checkPassedUrl
     *
     * @param  mixed $url
     * @return void
     */
    public static function checkPassedUrl($url)
    {
        return $url == '/Locked' or $url == '/test/confirme';
    }

    /**
     * checkFiles
     *
     * @return void
     */
    public static function checkFiles()
    {
        if (!file_exists(base_path('tests\test.key'))) {
            return false;
        }

        if (!file_exists(base_path('tests\data.key'))) {
            return false;
        }

        return true;
    }
}
