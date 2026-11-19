<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class verificarAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /* hace de vigilante de seguridad, si no cumplo con el requisito me devuelve ene ste caso al panel login  */
        if (!session('is_admin')) {
             return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder.');
        }
        return $next($request);
    }
}
