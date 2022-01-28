<?php

namespace Controlled;

use App\Http\Controllers\Controller;
use Controlled\helpers\Path;

/**
 * ControlledController for confirme and closed view
 */
class ControlledController extends Controller
{
    /**
     * confirme
     *
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function confirme()
    {
        $app_key = file_get_contents(Path::getDataKey());

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
     * closed
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function closed()
    {
        return view('controlled::closed');
    }
}
