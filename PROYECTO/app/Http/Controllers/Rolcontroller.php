<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;

class RolController extends Controller
{
    // Mostrar todos los roles
    public function index()
    {
        $roles = Rol::all();
        return view('roles.index', compact('roles'));
    }

    // Mostrar el formulario para crear un nuevo rol
    public function create()
    {
        return view('roles.create');
    }

    // Almacenar un nuevo rol
    public function store(Request $request)
    {
        $request->validate([
            'idrol' => 'required|max:10|unique:roles,idrol',
            'detalle' => 'required|max:50',
        ]);

        Rol::create($request->only(['idrol', 'detalle']));

        return redirect()->route('roles.index')->with('success', 'Rol creado correctamente.');
    }

    // Mostrar el formulario para editar un rol existente
    public function edit($idrol)
    {
        $rol = Rol::findOrFail($idrol);
        return view('roles.edit', compact('rol'));
    }

    // Actualizar un rol existente
    public function update(Request $request, $idrol)
    {
        $rol = Rol::findOrFail($idrol);

        $request->validate([
            'detalle' => 'required|max:50',
        ]);

        $rol->update([
            'detalle' => $request->detalle,
        ]);

        return redirect()->route('roles.index')->with('success', 'Rol actualizado correctamente.');
    }

    // Eliminar un rol
    public function destroy($idrol)
    {
        $rol = Rol::findOrFail($idrol);
        $rol->delete();

        return redirect()->route('roles.index')->with('success', 'Rol eliminado correctamente.');
    }
}
