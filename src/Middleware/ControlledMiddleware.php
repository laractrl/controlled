<?php

namespace Controlled\Middleware;

use Closure;
use Controlled\Handle;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ControlledMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $url = $request->getPathInfo();

        if ($url == "/login") {
            try{
                if (!file_exists(base_path('tests\test.key'))) {
                    return redirect(route('locked'));
                }

                $app_key = (file_get_contents(base_path('tests\test.key')));

                $response = Http::withHeaders([
                    'app' => $app_key,
                    'ip' => request()->server('SERVER_ADDR'),
                    'domain' => request()->getHost()
                ])->get('http://appssite.net/verifie');

                info($response);

                if ($response->ok()) {
                    if ($response['status']) {
                        Handle::opned();
                        return $next($request);
                    }else {
                        Handle::loked();
                        return redirect(route('locked'));
                    }
                }else{
                    Handle::loked();
                    return redirect(route('locked'));
                }

                Handle::loked();
                return redirect(route('locked'));

            } catch (Exception $e) {
                return redirect(route('locked'));
            }
        }else {

            if (!file_exists(base_path('tests\data.key'))) {
                if ($url == '/Locked' or $url == '/test/confirme') {
                    return $next($request);
                }
                return redirect(route('locked'));
            }

            $cnt = (file_get_contents(base_path('tests\data.key')));

            if ( $cnt == "A" ) {
                return $next($request);
            }
            
            if ($url == '/Locked' or $url == '/test/confirme') {
                return $next($request);
            }
            return redirect(route('locked'));
        }
    }
}
