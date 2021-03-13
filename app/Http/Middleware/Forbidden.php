<?php

namespace App\Http\Middleware;

use App\Models\Ip;
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
        Ip::where('ip', request()->ip())->first() && abort(403);

        Log::checkUser();

        return abort(403);
    }
}
