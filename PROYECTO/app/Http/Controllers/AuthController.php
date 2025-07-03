<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('Login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $usuario = Usuario::where('email', $request->email)->first();

        if ($usuario && password_verify($request->password, $usuario->contrasena)) {
            session(['usuario' => $usuario]);

            // Redirigir según el rol
            switch ($usuario->idrol) {
                case 0:
                    return redirect()->route('admin.index');
                case 1:
                    return redirect()->route('docente.dashboard');
                case 2:
                    return redirect()->route('estudiante.dashboard');
                default:
                    return redirect()->route('login.form')->withErrors(['email' => 'Rol no reconocido.']);
            }
        }

        return back()->withErrors(['email' => 'Correo o contraseña incorrectos'])->withInput();
    }

    public function logout()
    {
        session()->forget('usuario');
        return redirect()->route('login')->with('success', 'Sesión cerrada exitosamente.');
    }
}
