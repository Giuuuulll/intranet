<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRol
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->rol === 'usuario') {
            return redirect()->route('dashboard')->with('error', 'No tenés permiso para acceder.');
        }

        return $next($request);
    }
}
