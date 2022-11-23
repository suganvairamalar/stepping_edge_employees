<?php

namespace App\Http\Middleware;

use Closure;

class PreventBackHistory
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
        //return $next($request);
        $response=$next($request);
        $response->headers->set('Cache-Control','nocache, no-store, max-age=0, must-revalidate');
        //below line code for clear cache
         $response->headers->set("Cache-Control: post-check=0, pre-check=0", false);
        $response->headers->set('Pragma','no-cache');
        $response->headers->set('Expires','Sat, 01 Jan 2020 00:00:00 GMT');
            
        return $response;
    }
}
