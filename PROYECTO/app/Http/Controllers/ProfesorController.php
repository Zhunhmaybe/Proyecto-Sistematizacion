<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProfesorController extends Controller
{
    // Mostrar todos los profesores
    public function index()
    {
        $profesores = Profesor::with('area.departamento')->get();
        return view('profesor.index', compact('profesores'));
    }
    // Mostrar formulario de creación
    public function create()
    {
        $areas = Area::all();
        return view('profesor.create', compact('areas'));
    }

    public function dashboard()
    {
        $totalProfesores = Profesor::count();
        $profesoresPorArea = Area::withCount('profesor')->with('departamento')->get();

        return view('profesor', compact('totalProfesores', 'profesoresPorArea'));
    }



    // Guardar un nuevo profesor
    public function store(Request $request)
    {
        $request->validate([
            'idpro' => 'required|max:10|unique:profesores,idpro',
            'nombrespro' => 'required|max:50',
            'apellidopro' => 'required|max:50',
            'correopro' => 'required|email|max:100',
            'fechanacimientopro' => 'required|date',
            'idare' => 'required|exists:areas,idare',
        ]);

        Profesor::create($request->only([
            'idpro',
            'nombrespro',
            'apellidopro',
            'correopro',
            'fechanacimientopro',
            'idare'
        ]));

        return redirect()->route('profesor.index')->with('success', 'Profesor registrado correctamente.');
    }

    // Mostrar formulario de edición
    public function edit($idpro)
    {
        $profesor = Profesor::findOrFail($idpro);
        $areas = Area::all();
        return view('profesor.edit', compact('profesor', 'areas'));
    }

    // Actualizar profesor existente
    public function update(Request $request, $idpro)
    {
        $profesor = Profesor::findOrFail($idpro);

        $request->validate([
            'nombrespro' => 'required|max:50',
            'apellidopro' => 'required|max:50',
            'correopro' => 'required|email|max:100',
            'fechanacimientopro' => 'required|date',
            'idare' => 'required|exists:areas,idare',
        ]);

        $profesor->update($request->only([
            'nombrespro',
            'apellidopro',
            'correopro',
            'fechanacimientopro',
            'idare'
        ]));

        return redirect()->route('profesor.index')->with('success', 'Profesor actualizado correctamente.');
    }

    // Eliminar profesor
    public function destroy($idpro)
    {
        $profesor = Profesor::findOrFail($idpro);
        $profesor->delete();

        return redirect()->route('profesor.index')->with('success', 'Profesor eliminado correctamente.');
    }
}
