<?php

namespace App\Http\Controllers;

use App\Models\Titulacion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TitulacionController extends Controller
{
    // Mostrar todas las titulaciones
    public function index()
    {
        $titulaciones = Titulacion::all();
        return view('titulaciones.index', compact('titulaciones'));
    }

    // Mostrar formulario para crear titulación
    public function create()
    {
        return view('titulaciones.create');
    }

    // Guardar nueva titulación
    public function store(Request $request)
    {
        $request->validate([
            'detalletit' => 'required|string|max:100',
            'nivelestit' => 'required|string|max:50',
        ]);

        Titulacion::create([
            'idtit' => $request->idtit,
            'detalletit' => $request->detalletit,
            'nivelestit' => $request->nivelestit,
        ]);

        return redirect()->route('titulacion.index')->with('success', 'Titulación creada correctamente.');
    }

    // Mostrar formulario para editar titulación
    public function edit($idtit)
    {
        $titulacion = Titulacion::findOrFail($idtit);
        return view('titulaciones.edit', compact('titulacion'));
    }

    // Actualizar titulación
    public function update(Request $request, $idtit)
    {
        $titulacion = Titulacion::findOrFail($idtit);

        $request->validate([
            'detalletit' => 'required|string|max:100',
            'nivelestit' => 'required|string|max:50',
        ]);

        $titulacion->update([
            'detalletit' => $request->detalletit,
            'nivelestit' => $request->nivelestit,
        ]);

        return redirect()->route('titulacion.index')->with('success', 'Titulación actualizada correctamente.');
    }

    // Eliminar titulación
    public function destroy($idtit)
    {
        $titulacion = Titulacion::findOrFail($idtit);
        $titulacion->delete();

        return redirect()->route('titulaciones.index')->with('success', 'Titulación eliminada correctamente.');
    }
}
