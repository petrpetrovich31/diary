<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Log;

class Forbidden
{
    /** Handle an incoming request.
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Log::checkUser();

        return abort(403);
    }
}
