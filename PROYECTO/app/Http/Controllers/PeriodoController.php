<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    // Mostrar todos los periodos
    public function index()
    {
        $periodos = Periodo::all();
        return view('periodos.index', compact('periodos'));
    }

    // Mostrar formulario de edición
    public function edit($idper)
    {
        $periodo = Periodo::findOrFail($idper);
        return view('periodos.edit', compact('periodo'));
    }

    // Actualizar un periodo
    public function update(Request $request, $idper)
    {
        $periodo = Periodo::findOrFail($idper);

        $request->validate([
            'detalleper' => 'required|max:100',
            'inicioper' => 'required|date',
            'finper' => 'required|date|after_or_equal:inicioper',
        ]);

        $periodo->update([
            'detalleper' => $request->detalleper,
            'inicioper' => $request->inicioper,
            'finper' => $request->finper,
        ]);

        return redirect()->route('periodos.index')->with('success', 'Periodo actualizado correctamente.');
    }

    // (Opcional) Crear nuevo periodo
    public function create()
    {
        return view('periodos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'idper' => 'required|unique:periodos,idper|max:10',
            'detalleper' => 'required|max:100',
            'inicioper' => 'required|date',
            'finper' => 'required|date|after_or_equal:inicioper',
        ]);

        Periodo::create($request->all());

        return redirect()->route('periodos.index')->with('success', 'Periodo registrado correctamente.');
    }
}
