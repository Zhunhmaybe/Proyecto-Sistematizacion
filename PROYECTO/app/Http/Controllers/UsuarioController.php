<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rol;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    // Mostrar todos los usuarios
    public function index()
    {
        $usuarios = User::with('rol')->get();
        return view('usuarios.index', compact('usuarios'));
    }

    // Mostrar formulario para crear usuario
    public function create()
    {
        $roles = Rol::all();
        $areas = Area::all();
        return view('usuarios.create', compact('roles', 'areas'));
    }

    // Almacenar un nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'idusu' => 'required|unique:users,idusu|max:10',
            'nombredusu' => 'required|string|max:50',
            'apellidousu' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'contrasena' => 'required|string|min:6',
            'fechanacimiento' => 'required|date',
            'idrol' => 'required|string',
            'idare' => $request->idrol == '1' ? 'required|string' : 'nullable',
        ]);

        User::create([
            'idusu' => $request->idusu,
            'nombredusu' => $request->nombredusu,
            'apellidousu' => $request->apellidousu,
            'email' => $request->email,
            'fechanacimiento' => $request->fechanacimiento,
            'contrasena' => Hash::make($request->contrasena),
            'idrol' => $request->idrol,
            'idare' => $request->idrol == '1' ? $request->idare : null, 
            'remember_token' => Str::random(10),
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    // Mostrar formulario para editar usuario
    public function edit($idusu)
    {
        $usuario = User::findOrFail($idusu);
        $roles = Rol::all();
        $areas = Area::all();
        return view('usuarios.edit', compact('usuario', 'roles', 'areas'));
    }

    // Actualizar usuario
    public function update(Request $request, $idusu)
    {
        $usuario = User::findOrFail($idusu);

        $request->validate([
            'nombredusu' => 'required|string|max:50',
            'apellidousu' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email,' . $idusu . ',idusu',
            'fechanacimiento' => 'required|date',
            'idrol' => 'required|string',
            'idare' => $request->idrol == '1' ? 'required|string' : 'nullable',

        ]);

        $usuario->update([
            'nombredusu' => $request->nombredusu,
            'apellidousu' => $request->apellidousu,
            'email' => $request->email,
            'fechanacimiento' => $request->fechanacimiento,
            'idrol' => $request->idrol,
            'idare' => $request->idrol == '1' ? $request->idare : null,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    // Eliminar usuario
    public function destroy($idusu)
    {
        $usuario = User::findOrFail($idusu);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
