<?php

namespace App\Http\Middleware;

use Closure;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$Level)
    {
        if(in_array($request->user()->level,$Level)){
            return $next($request);
        }
        return redirect('/');
    }
}
