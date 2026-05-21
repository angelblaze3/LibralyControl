<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsNotAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Si no esta autenticado, lo mandamos al login de usuario
        if (! Auth::check()) {
            return redirect()->route('user.login');
        }

        // Si esta autenticado pero es admin, no deberia estar en rutas de usuario
        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    }
}
