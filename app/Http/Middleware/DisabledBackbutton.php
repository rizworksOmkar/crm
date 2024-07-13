<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DisabledBackbutton
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $responce = $next($request);
        $responce->headers->set('Cache-Control','nocache, no-store,max-age=0, must-revalidate');
        $responce->headers->set('Pragma','no-cache');
        $responce->headers->set('Expires','Sat, 01 Jan 2000 00:00:00 GMT');
        return $responce;
    }
}
