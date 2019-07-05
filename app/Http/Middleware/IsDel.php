<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
class IsDel
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

        $user = User::where('username', $request->username)->first();
       // dd($request->input('username'));
        $isDel = ((isset($user))?$user->activated:1);
        //$isQuit =((isset($user))?$user->role_id:3);
        if ($isDel==0 ){
            abort(401);
        } 
        // elseif ($isQuit==3) {
            
        // }
        else {
            return $next($request);
        }
     
    }
    
}
