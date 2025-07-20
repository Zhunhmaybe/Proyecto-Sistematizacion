<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Area;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $areas = Area::all();
        $roles = Rol::all();
        return view('auth.register', compact('areas', 'roles'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombredusu' => 'required|string|max:50',
            'apellidousu' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|unique:usuarios',
            'contrasena' => 'required|string|min:8|confirmed',
            'fechanacimiento' => 'required|date',
            'idare' => 'nullable|exists:areas,idare',
            'idrol' => 'nullable|exists:roles,idrol',
        ]);

        $usuario = Usuario::create([
            'idusu' => Str::random(10), // Generate a random 10-character ID
            'nombredusu' => $request->nombredusu,
            'apellidousu' => $request->apellidousu,
            'contrasena' => Hash::make($request->contrasena),
            'email' => $request->email,
            'fechanacimiento' => $request->fechanacimiento,
            'idare' => $request->idare,
            'idrol' => $request->idrol,
        ]);

        auth()->login($usuario);

        return redirect()->route('home')->with('success', 'Registro exitoso.');
    }
}

