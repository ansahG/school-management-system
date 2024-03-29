<?php

namespace App\Http\Middleware\Administrator;

use Closure;
use Illuminate\Http\Request;

class AdminOnlyRoute
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
           if(auth()->user()->_department == 'Administrator')
           {
             return $next($request);
           }

           return redirect(404);
    }
}


