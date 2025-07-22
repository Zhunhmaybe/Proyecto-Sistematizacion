<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\Estudiante;
use App\Models\Periodo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function index()
    {
        $matriculas = Matricula::with('estudiante', 'periodo')->get();
        return view('matriculas.index', compact('matriculas'));
    }

    public function create()
    {
        $periodos = Periodo::all();
        $estudiantes = Estudiante::where('tipo', 2)->get();
        return view('matriculas.create', compact('periodos', 'estudiantes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'idest' => 'required|exists:estudiantes,idest',
            'idper' => 'required|exists:periodos,idper',
            'fechamat' => 'required|date',
        ]);

        $idmat = Str::random(10);

        Matricula::create([
            'idmat' => $idmat,
            'idper' => $validated['idper'],
            'idest' => $validated['idest'],
            'fechamat' => $validated['fechamat'],
        ]);

        return redirect()->route('matriculas.index')->with('success', 'Matrícula creada con éxito.');
    }

    public function edit($idmat)
    {
        $matricula = Matricula::findOrFail($idmat);
        $periodos = Periodo::all();
        $estudiantes = Estudiante::where('tipo', 2)->get();
        return view('matriculas.edit', compact('matricula', 'periodos', 'estudiantes'));
    }

    public function update(Request $request, $idmat)
    {
        $validated = $request->validate([
            'idest' => 'required|exists:estudiantes,idest',
            'idper' => 'required|exists:periodos,idper',
            'fechamat' => 'required|date',
        ]);

        $matricula = Matricula::findOrFail($idmat);

        $matricula->update([
            'idper' => $validated['idper'],
            'idest' => $validated['idest'],
            'fechamat' => $validated['fechamat'],
        ]);

        return redirect()->route('matriculas.index')->with('success', 'Matrícula actualizada con éxito.');
    }

    public function destroy($idmat)
    {
        $matricula = Matricula::findOrFail($idmat);
        $matricula->delete();

        return redirect()->route('matriculas.index')->with('success', 'Matrícula eliminada con éxito.');
    }
}
