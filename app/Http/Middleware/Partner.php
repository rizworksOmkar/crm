<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Closure;

class Partner
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
        if(Auth::user()){
            if (Auth::user()->role_type=='partner'){
                return $next($request);
            }else{
                return response()->view('unauthorized', [], 401);
            }
        }else{
            return Redirect::to('/');
        }
        
    }
}
