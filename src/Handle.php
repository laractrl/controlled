<?php

namespace Controlled;

use Illuminate\Support\Facades\Http;

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

        return redirect(route('locked'));
    }

    static public function verifie($local = true)
    {
        if ($local) {
            $data = (file_get_contents(base_path('tests\data.key')));

            return $data == "A";
        }else if (!$local) {
            $app_key = (file_get_contents(base_path('tests\test.key')));

            return Http::withHeaders([
                'app' => $app_key,
                'ip' => request()->server('SERVER_ADDR'),
                'domain' => request()->getHost()
            ])->get('http://appssite.net/verifie');
        }

        return false;
    }

    static public function checkPassedUrl($url)
    {
        return $url == '/Locked' or $url == '/test/confirme';
    }
}