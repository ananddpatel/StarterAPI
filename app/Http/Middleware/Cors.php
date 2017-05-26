<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $corsRoutes = require(realpath('../config/cors.php'));
        $route = $request->server()['REQUEST_URI'];
        if (!in_array($route, $corsRoutes['prevent'])) {
            header('Access-Control-Allow-Origin: *');
        }
        return $next($request);
    }
}
