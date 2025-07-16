<?php

namespace App\Http\Controllers;

use App\Models\Dia;
use Illuminate\Http\Request;

class DiaController extends Controller
{
    // Mostrar todos los días
    public function index()
    {
        $dias = Dia::all();
        return view('dias.index', compact('dias'));
    }

    // Mostrar el formulario para crear un nuevo día
    public function create()
    {
        return view('dias.create');
    }

    // Almacenar un nuevo día
    public function store(Request $request)
    {
        $validated = $request->validate([
            'iddia'=>'required|max:10',
            'nombredia' => 'required|max:20',
        ]);

        Dia::create([
            'iddia' => $validated['iddia'], // Genera un id único
            'nombredia' => $validated['nombredia'],


        ]);

        return redirect()->route('dias.index')->with('success', 'Día creado con éxito.');
    }

    // Mostrar el formulario para editar un día
    public function edit($id)
    {
        $dia = Dia::findOrFail($id);
        return view('dias.edit', compact('dia'));
    }

    // Actualizar un día
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombredia' => 'required|max:20',
        ]);

        $dia = Dia::findOrFail($id);
        $dia->update([
            'nombredia' => $validated['nombredia'],
        ]);

        return redirect()->route('dias.index')->with('success', 'Día actualizado con éxito.');
    }

    // Eliminar un día
    public function destroy($id)
    {
        $dia = Dia::findOrFail($id);
        $dia->delete();

        return redirect()->route('dias.index')->with('success', 'Día eliminado con éxito.');
    }
}
