<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ManagerMiddleware
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
        
        if(Auth::user()->role_as=="manager"){
            return $next($request);
        }
        else{
            return redirect('/employee_detail_leaves')->with('status','You are not allowed to access the dashboard');
        }
    }
}
