<?php

namespace Controlled\Middleware;

use Closure;
use Controlled\Handle;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/**
 * Middleware
 */
class ControlledMiddleware
{
    /**
     * handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $url = $request->getPathInfo();

        if (!Handle::checkFiles()) {
            return Handle::close();
        }

        if (in_array($url, config('controlled.urls', [])) or $url == "/login") {
            try {
                $response = Handle::serverChecker();

                if ($response->ok()) {
                    if ($response['status']) {
                        Handle::open();
                        return $next($request);
                    } else {
                        return Handle::close($response['code']);
                    }
                } elseif (Handle::localChecker()) {
                    return $next($request);
                }

                return Handle::close();
            } catch (Exception $e) {
                if (Handle::localChecker()) {
                    return $next($request);
                }

                return redirect(route('closed'));
            }
        } else {
            if (Handle::localChecker()) {
                return $next($request);
            }

            if (Handle::checkPassedUrl($url)) {
                return $next($request);
            }

            return redirect(route('closed'));
        }
    }
}
