<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Dia;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
     // Mostrar todos los horarios
    public function index()
    {
        $horarios = Horario::with('dia')->get();  // Incluye la relación con el modelo Dia
        return view('horarios.index', compact('horarios'));
    }

    // Mostrar formulario para crear un nuevo horario
    public function create()
    {
        $dias = Dia::all();  // Trae todos los días disponibles
        return view('horarios.create', compact('dias'));
    }

    // Almacenar un nuevo horario
    public function store(Request $request)
    {
        $validated = $request->validate([
            'idhor'=>'required|max:10',
            'horaini' => 'required|date_format:H:i',
            'horafin' => 'required|date_format:H:i|after:horaini',
            'iddia' => 'required|exists:dias,iddia',  // Verifica que el día exista
        ]);

        Horario::create([
            'idhor' => $validated['idhor'],
            'horaini' => $validated['horaini'],
            'horafin' => $validated['horafin'],
            'iddia' => $validated['iddia'],
        ]);

        return redirect()->route('horarios.index')->with('success', 'Horario creado con éxito.');
    }

    // Mostrar el formulario para editar un horario
    public function edit($id)
    {
        $horario = Horario::findOrFail($id);
        $dias = Dia::all();  // Trae todos los días disponibles
        return view('horarios.edit', compact('horario', 'dias'));
    }

    // Actualizar un horario
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'horaini' => 'required|date_format:H:i',
            'horafin' => 'required|date_format:H:i|after:horaini',
            'iddia' => 'required|exists:dias,iddia',  // Verifica que el día exista
        ]);

        $horario = Horario::findOrFail($id);
        $horario->update([
            'horaini' => $validated['horaini'],
            'horafin' => $validated['horafin'],
            'iddia' => $validated['iddia'],
        ]);

        return redirect()->route('horarios.index')->with('success', 'Horario actualizado con éxito.');
    }

    // Eliminar un horario
    public function destroy($id)
    {
        $horario = Horario::findOrFail($id);
        $horario->delete();

        return redirect()->route('horarios.index')->with('success', 'Horario eliminado con éxito.');
    }
}
