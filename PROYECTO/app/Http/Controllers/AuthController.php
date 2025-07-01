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
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Correo o contraseña incorrectos']);
    }

    public function logout()
    {
        session()->forget('usuario');
        return redirect()->route('login.form')->with('success', 'Sesión cerrada exitosamente.');
    }
}
