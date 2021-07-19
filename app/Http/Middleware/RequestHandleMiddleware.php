<?php

namespace App\Http\Middleware;

use App\Events\Http\RequestHandled;
use Closure;

class RequestHandleMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        event(new RequestHandled($request, $response));

        return $response;
    }
}
