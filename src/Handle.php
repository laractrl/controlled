<?php

namespace Controlled;

use Illuminate\Support\Facades\Http;

class Handle
{
    public static function opned()
    {
        file_put_contents(base_path('tests\data.key'), "A");
        // info('Opned app');

        return true;
    }

    public static function loked($code = "", $message = "")
    {
        file_put_contents(base_path('tests\data.key'), "L");
        // info('loked app');

        return redirect(route('locked', ['code' => $code,'message' => $message]));
    }

    public static function status()
    {
        // info('verifie status (local)');

        $data = file_get_contents(base_path('tests\data.key'));

        return $data == "A";
    }

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

    public static function checkPassedUrl($url)
    {
        return $url == '/Locked' or $url == '/test/confirme';
    }

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
