<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Departamento;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    // Mostrar todas las áreas

    public function index()
    {
        $areas = Area::with('Departamento')->get();
        return view('areas.index', compact('areas'));
    }



    // Mostrar formulario de creación
    public function create()
    {
        $departamentos = Departamento::all();
        return view('areas.create', compact('departamentos'));
    }

    // Guardar nueva área
    public function store(Request $request)
    {
        $request->validate([
            'idare' => 'required|max:10|unique:areas,idare',
            'nombreare' => 'required|max:50',
            'iddep' => 'required|exists:departamentos,iddep',
        ]);

        Area::create([
            'idare' => $request->idare,
            'nombreare' => $request->nombreare,
            'iddep' => $request->iddep,
        ]);

        return redirect()->route('areas.index')->with('success', 'Área registrada correctamente.');
    }

    // Mostrar formulario de edición
    public function edit($idare)
    {
        $area = Area::findOrFail($idare);
        $departamentos = Departamento::all();
        return view('areas.edit', compact('area', 'departamentos'));
    }

    // Actualizar área
    public function update(Request $request, $idare)
    {
        $area = Area::findOrFail($idare);

        $request->validate([
            'nombreare' => 'required|max:50',
            'iddep' => 'required|exists:departamentos,iddep',
        ]);

        $area->update([
            'nombreare' => $request->nombreare,
            'iddep' => $request->iddep,
        ]);

        return redirect()->route('areas.index')->with('success', 'Área actualizada correctamente.');
    }

    // Eliminar área
    public function destroy($idare)
    {
        $area = Area::findOrFail($idare);
        $area->delete();

        return redirect()->route('areas.index')->with('success', 'Área eliminada correctamente.');
    }
}
