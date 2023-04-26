<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminOnlyRoutes
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

        /*
        $usuario = auth()->user()->name;

        
        if($usuario != 'allan'){
            return redirect('/login');
        }
        else{
            return $next($request);
        }
        */

        $nivel = auth()->user()->level;

        
        if($nivel != 'admin'){
            return redirect('/login');
        }
        else{
            return $next($request);
        }
        
    }
}
