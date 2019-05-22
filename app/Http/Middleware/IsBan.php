<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
class IsBan
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
        $isBaned = ((isset($user))?$user->activated:1);
        if ($isBaned==0){
            
                return view('errors.login');   
        } 
       return $next($request);
    }
    
}
