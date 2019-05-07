<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
       if(auth()->check()&& $request->user()->roleCheck==2 &&$request->user()->deleted==0){
        return $next($request);
        }abort(403);  
    }
    
}
