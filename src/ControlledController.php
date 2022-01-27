<?php

namespace Controlled;

use App\Http\Controllers\Controller;

/**
 * ControlledController for confirme and locked view
 */
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

    /**
     * locked
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function locked()
    {
        return view('controlled::locked');
    }
}
