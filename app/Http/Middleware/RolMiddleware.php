<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RolMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = auth()->user();

        // Si no tiene ninguno de los roles permitidos
        if (!in_array($user->rol, $roles)) {
            return redirect()->route('dashboard')->with('error', 'No tenés permiso para acceder');
        }

        return $next($request);
    }
}
