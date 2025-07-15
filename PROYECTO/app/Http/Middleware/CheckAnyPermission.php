<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAnyPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed ...$roles
     * @return mixed
     */
   public function handle(Request $request, Closure $next, ...$roles)
    {
        $usuario = session('usuario'); // O auth()->user() si usas Auth

        if (!$usuario) {
            return redirect()->route('Login')->withErrors(['Debes iniciar sesión.']);
        }

        // Si pasas varios roles separados por coma (ej: admin,profesor)
        $idrol = is_numeric($usuario->idrol) ? (int)$usuario->idrol : $usuario->idrol;

        foreach ($roles as $rol) {
            if (
                ($rol === 'admin' && $idrol === 0) ||
                ($rol === 'profesor' && $idrol === 1) ||
                ($rol === 'estudiante' && $idrol === 2)
            ) {
                return $next($request);
            }
        }

        // Si no tiene ninguno de los roles requeridos
        return redirect('/')->withErrors(['No tienes permiso para acceder a esta sección.']);
    }
}
