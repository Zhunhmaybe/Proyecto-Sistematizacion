<?php

namespace App\Http\Controllers;

use App\Models\Usuario;


class DocenteController extends Controller
{
    public function dashboard()
    {
        $usuario = session('usuario');

        if (!$usuario || $usuario->idrol != 1) { // 1 = docente
            return redirect()->route('login.form')->withErrors(['access' => 'Acceso no autorizado']);
        }

        // Recargar el usuario con relaciones para usar en la vista
        $usuario = Usuario::with('rol', 'area')->find($usuario->idusu);

        return view('docente', compact('usuario'));
    }
}
