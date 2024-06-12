<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ShareUserData
{
    public function handle($request, Closure $next)
    {
        // Obtener el usuario autenticado
        $user = Auth::user();
        
        // Compartir el usuario con todas las vistas
        View::share('user', $user);
        
        return $next($request);
    }
}
