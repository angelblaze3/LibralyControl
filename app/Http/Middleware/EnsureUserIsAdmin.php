<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Si no esta autenticado, lo mandamos al login de admin
        if (! Auth::check()) {
            return redirect()->route('admin.login');
        }

        // Si esta autenticado pero no es admin, lo rechazamos con 403
        if (! Auth::user()->isAdmin()) {
            abort(403, 'Access denied.');
        }

        // Todo ok, dejamos pasar la request al controlador
        return $next($request);
    }
}
