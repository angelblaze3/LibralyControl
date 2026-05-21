<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    // Muestra el formulario de login para usuarios
    public function showLoginForm()
    {
        return view('auth.user-login');
    }

    public function login(Request $request)
    {
        // Validamos que vengan email y password
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Auth::attempt() verifica las credenciales contra la DB
        // Si son correctas, inicia la sesion automaticamente
        if (Auth::attempt($credentials)) {
            // Regeneramos el session ID para prevenir session fixation attacks
            $request->session()->regenerate();

            // Si el usuario que intento entrar es admin, lo rechazamos aqui
            // El admin debe usar su propio login
            if (Auth::user()->isAdmin()) {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Please use the admin login.',
                ]);
            }

            return redirect()->route('user.dashboard');
        }

        // withErrors() envia el error de vuelta al formulario
        // withInput() mantiene el email que escribio para no tener que reescribirlo
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidamos la sesion y regeneramos el token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('user.login');
    }
}
