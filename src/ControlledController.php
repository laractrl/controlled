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
        $app_key = file_get_contents(Path::getTestKey());

        return response(
            [
                'contant' => 'in confirmation',
            ],
            200,
            [
                'app_key' => $app_key ?? 'In Set',
                'ip' => appIP(),
                'domain' => appDomain()
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
        $view = config('view', null) ?? 'controlled::closed';

        info($view);
        return view($view);
    }
}
