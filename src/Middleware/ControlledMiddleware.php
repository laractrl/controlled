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
    public function Handle(Request $request, Closure $next)
    {
        $url = $request->getPathInfo();

        if (!Handle::checkFiles()) {
            return Handle::loked();
        }

        if (in_array($url, config('controlled.urls', [])) or $url == "/login") {
            try {

                $response = Handle::verifie(false);

                if ($response->ok()) {
                    if ($response['status']) {
                        Handle::opned();
                        return $next($request);
                    } else {
                        return Handle::loked($response['code']);
                    }
                } else {
                    if (Handle::verifie()) {
                        return $next($request);
                    }
                    return Handle::loked();
                }
                return Handle::loked();
            } catch (Exception $e) {

                if (Handle::verifie()) {
                    return $next($request);
                }

                return redirect(route('locked'));
            }
        } else {

            if (Handle::verifie()) {
                return $next($request);
            }

            if (Handle::checkPassedUrl($url)) {
                return $next($request);
            }

            return redirect(route('locked'));
        }
    }
}
