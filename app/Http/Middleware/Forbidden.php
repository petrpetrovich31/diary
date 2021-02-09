<?php

namespace App\Http\Middleware;

use Closure;

class Forbidden
{
    /** Handle an incoming request.
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return abort(403);
    }
}
