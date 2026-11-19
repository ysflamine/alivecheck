<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        // comprobamos que coincida con el 'name' del formulario
        $request->validate([
            'usuario' => 'required',
            'password' => 'required',
        ]);

        // ahora usando los vaores del env pero desde config/admin.php
        if ($request->usuario === config('admin.usuario') && Hash::check($request->password, config('admin.password'))) {
            /* si es correcto la comprovaicon asignamos la sesion */
            session(['is_admin' => true]);
            /* y redirigimos */
            return redirect()->route('services.index');
        }

        //Si falla el error apunta a 'usuario' para que el Blade lo muestre
        return back()->withErrors(['usuario' => 'Credenciales incorrectas.'])->withInput();
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}