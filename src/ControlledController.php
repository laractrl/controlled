<?php

namespace Controlled;

use App\Http\Controllers\Controller;

class ControlledController extends Controller
{
    public function confirme()
    {
        $app_key = (file_get_contents(base_path('tests\test.key')));
        return response(
            [
                'contant' => 'in confirmation',
            ],
            200,
            [
                'app_key' => $app_key ?? 'In Set',
                'ip' => request()->server('SERVER_ADDR'),
                'domain' => request()->getHost()
            ]
        );
    }

    public function locked()
    {
        return view('locked');
    }
}
