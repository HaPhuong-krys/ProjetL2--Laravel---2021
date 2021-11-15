<?php

namespace App\Http\Middleware;

use Closure;

use Auth;
use Illuminate\Http\Request;

class is_Etudiant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && Auth::user()->type == "etudiant"){
            return $next($request);
        }
        else{
            abort(403,'Vous etes pas etudiant');
        }
    }
}
