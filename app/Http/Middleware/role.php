<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {   
        if(!isset(Auth::user()->role_id)){
            return redirect('login');
        }
        if(Auth::user()->role_id != $role){
          return redirect('home');
        }
        return $next($request);
    }
}
