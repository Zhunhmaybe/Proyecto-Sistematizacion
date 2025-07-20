<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutoria;
use App\Models\Horario;
use App\Models\Dia;
use App\Models\Detallematricula;


class TutoriaController extends Controller
{
    // Mostrar todas las tutorías
    public function index()
    {
        $tutorias = Tutoria::with(['detallematricula', 'horario'])->get();
        return view('tutorias.index', compact('tutorias'));
    }

    // Mostrar formulario para crear una nueva tutoría
    public function create()
    {
        $detallematriculas = Detallematricula::all();  // Obtener todos los registros de detalle de matrícula
        $horarios = Horario::all();  // Obtener todos los registros de horarios
        return view('tutorias.create', compact('detallematriculas', 'horarios'));
    }

    // Almacenar una nueva tutoría
    public function store(Request $request)
    {
        $validated = $request->validate([
            'iddet' => 'required|exists:detallematriculas,iddet',
            'idhor' => 'required|exists:horarios,idhor',
            'detalletut' => 'required|max:100',
        ]);

        Tutoria::create([
            'iddet' => $validated['iddet'],
            'idhor' => $validated['idhor'],
            'detalletut' => $validated['detalletut'],
        ]);

        return redirect()->route('tutorias.index')->with('success', 'Tutoría creada con éxito.');
    }

    // Mostrar el formulario para editar una tutoría
    public function edit($id)
    {
        $tutoria = Tutoria::findOrFail($id);
        $detallematriculas = Detallematricula::all();  // Obtener todos los registros de detalle de matrícula
        $horarios = Horario::all();  // Obtener todos los registros de horarios
        return view('tutorias.edit', compact('tutoria', 'detallematriculas', 'horarios'));
    }

    // Actualizar una tutoría existente
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'iddet' => 'required|exists:detallematriculas,iddet',
            'idhor' => 'required|exists:horarios,idhor',
            'detalletut' => 'required|max:100',
        ]);

        $tutoria = Tutoria::findOrFail($id);
        $tutoria->update([
            'iddet' => $validated['iddet'],
            'idhor' => $validated['idhor'],
            'detalletut' => $validated['detalletut'],
        ]);

        return redirect()->route('tutorias.index')->with('success', 'Tutoría actualizada con éxito.');
    }

    public function createFromProfesor()
    {
        $detallematriculas = Detallematricula::all();  // Obtener todos los registros de detalle de matrícula
        $horarios = Horario::all();  // Obtener todos los registros de horarios

        return view('profesores.tutorias.create', compact('detallematriculas', 'horarios'));
    }

    public function storeFromProfesor(Request $request)
    {

        $validated = $request->validate([
            'iddet' => 'required|exists:detallematriculas,iddet',
            'idhor' => 'required|exists:horarios,idhor',
            'detalletut' => 'required|max:100',
        ]);

        Tutoria::create([
            'iddet' => $validated['iddet'],
            'idhor' => $validated['idhor'],
            'detalletut' => $validated['detalletut'],
        ]);

        return redirect()->route('profesores.tutorias.index')->with('success', 'Tutoría creada con éxito.');
    }

    public function misTutorias()
    {
        $tutorias = Tutoria::with(['detallematricula', 'horario'])->get();

        return view('profesores.tutorias.index', compact('tutorias'));
    }

    // Eliminar una tutoría
    public function destroy($id)
    {
        $tutoria = Tutoria::findOrFail($id);
        $tutoria->delete();

        return redirect()->route('tutorias.index')->with('success', 'Tutoría eliminada con éxito.');
    }
}
