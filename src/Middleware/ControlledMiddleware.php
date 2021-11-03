<?php

namespace Controlled\Middleware;

use Closure;
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
                        file_put_contents(base_path('tests\data.key'), "A");
                        return $next($request);
                    }else {
                        file_put_contents(base_path('tests\data.key'), "L");
                        return redirect(route('locked'));
                    }
                }else{
                    file_put_contents(base_path('tests\data.key'), "L");
                    return redirect(route('locked'));
                }

                file_put_contents(base_path('tests\data.key'), "L");
                return redirect(route('locked'));

            } catch (Exception $e) {
                info($e->getMessage());
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
