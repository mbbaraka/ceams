<?php

namespace App\Http\Middleware;

use Closure;

class HrMiddleware
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
        // if ($request->age <= 200) {
        //     return redirect('home');
        // }
        return $next($request);
    }
}
