<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
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
        if(auth()->user()->type !=='admin'){//bu admin olmuyanlar admin sehifesin gormemesi ucun yazilan middlewaredi,ve bunu kernelde tanidiriq,routede de yaziriq
            redirect()->route('dasboard');
        }
        return $next($request);
    }
}
