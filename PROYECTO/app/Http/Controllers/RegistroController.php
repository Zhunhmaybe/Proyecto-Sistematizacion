<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Area;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    // Mostrar todos los usuarios
    public function index()
    {
        $usuarios = Usuario::all();
        $areas = Area::all(); // para el combo de áreas
        return view('usuarios.index', compact('usuarios','areas'));
    }

    // Mostrar formulario para editar un usuario
    public function edit($idusu)
    {
        $usuario = Usuario::findOrFail($idusu);
        $areas = Area::all(); // para el combo de áreas
        return view('usuarios.edit', compact('usuario', 'areas'));
    }

    // Actualizar usuario
    public function update(Request $request, $idusu)
    {
        $usuario = Usuario::findOrFail($idusu);

        $request->validate([
            'nombredusu' => 'required|max:50',
            'apellidousu' => 'required|max:50',
            'email' => 'required|email|max:100',
            'fechanacimiento' => 'required|date',
            'idare' => 'nullable|exists:areas,idare',
            'idrol' => 'required|in:0,1,2',
        ]);

        $usuario->update([
            'nombredusu' => $request->nombredusu,
            'apellidousu' => $request->apellidousu,
            'email' => $request->email,
            'fechanacimiento' => $request->fechanacimiento,
            'idare' => $request->idare, // puede ser null
            'idrol' => $request->idrol,
        ]);


        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }
    public function store(Request $request)
    {
        $request->validate([
            'idusu' => 'required|max:10',
            'nombredusu' => 'required|max:50',
            'apellidousu' => 'required|max:50',
            'contrasena' => 'required|min:6',
            'email' => 'required|email|max:100',
            'fechanacimiento' => 'required|date',
            'idare' => 'nullable|exists:areas,idare', // <- ahora opcional
            'idrol' => 'required|in:0,1,2',
        ]);

        Usuario::create([
            'idusu' => $request->idusu,
            'nombredusu' => $request->nombredusu,
            'apellidousu' => $request->apellidousu,
            'contrasena' => bcrypt($request->contrasena),
            'email' => $request->email,
            'fechanacimiento' => $request->fechanacimiento,
            'idare' => $request->idare, // puede ser null
            'idrol' => $request->idrol
        ]);

        return redirect()->back()->with('success', 'Usuario registrado con éxito.');
    }
}
