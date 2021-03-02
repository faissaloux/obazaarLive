<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsManager
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


        if (Auth::user() && Auth::user()->role == 'manager' ) {
            
            return $next($request);
        }else {
            return redirect()->to('/manager/login');
        }


    }
}
