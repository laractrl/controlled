<?php

namespace Controlled;

use Illuminate\Support\Facades\Http;

class Handle
{
    static public function opned()
    {
        file_put_contents(base_path('tests\data.key'), "A");
        info('Opned app');

        return true;
    }

    static public function loked($message = "")
    {
        file_put_contents(base_path('tests\data.key'), "L");
        info('loked app');

        return redirect(route('locked',['message' => $message]));
    }

    static public function verifie($local = true)
    {
        if ($local) {
            info('verifie local');

            $data = (file_get_contents(base_path('tests\data.key')));

            return $data == "A";
        }else if (!$local) {
            info('verifie server');

            $app_key = (file_get_contents(base_path('tests\test.key')));

            return Http::withHeaders([
                'app' => $app_key,
                'ip' => request()->server('SERVER_ADDR'),
                'domain' => request()->getHost()
            ])->get('http://appssite.net/api/v1/verifie');
        }

        return false;
    }

    static public function checkPassedUrl($url)
    {
        return $url == '/Locked' or $url == '/test/confirme';
    }
    
    static public function checkFiles()
    {
        if (!file_exists(base_path('tests\test.key'))) {
            return false;
        }

        if (!file_exists(base_path('tests\data.key'))) {
            return false;
        }

        return true;
    }

    public function status()
    {
        $data = file_get_contents(base_path('tests\data.key'));

        return $data == "A";
    }
}