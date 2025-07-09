<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Titulacion;
use App\Models\Nivel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AsignaturaController extends Controller
{
    // Mostrar todas las asignaturas
    public function index()
    {
        $asignaturas = Asignatura::with('titulacion', 'nivel')->get();
        return view('asignaturas.index', compact('asignaturas'));
    }

    // Mostrar formulario para crear una asignatura
    public function create()
    {
        $titulaciones = Titulacion::all();
        $niveles = Nivel::all();
        return view('asignaturas.create', compact('titulaciones', 'niveles'));
    }

    // Almacenar una nueva asignatura
    public function store(Request $request)
    {
        $request->validate([
            'idtit' => 'required|exists:titulaciones,idtit',
            'idniv' => 'required|exists:niveles,idniv',
            'nombreasi' => 'required|string|max:100',
            'teoricosasi' => 'required|integer|min:0',
            'practicosasi' => 'required|integer|min:0',
        ]);

        Asignatura::create([
            'idasi' => $request->idasi,
            'idtit' => $request->idtit,
            'idniv' => $request->idniv,
            'nombreasi' => $request->nombreasi,
            'teoricosasi' => $request->teoricosasi,
            'practicosasi' => $request->practicosasi,
        ]);

        return redirect()->route('asignatura.index')->with('success', 'Asignatura creada correctamente.');
    }

    // Mostrar formulario para editar una asignatura
    public function edit($idasi)    
    {
        $asignatura = Asignatura::all();
        $titulaciones = Titulacion::all();
        $niveles = Nivel::all();
        return view('asignaturas.edit', compact('asignatura', 'titulaciones', 'niveles'));
    }

    // Actualizar una asignatura
    public function update(Request $request, $idasi)
    {   
        $asignatura = Asignatura::findOrFail($idasi);

        $request->validate([
            'idtit' => 'required|exists:titulaciones,idtit',
            'idniv' => 'required|exists:niveles,idniv',
            'nombreasi' => 'required|string|max:100',
            'teoricosasi' => 'required|integer|min:0',
            'practicosasi' => 'required|integer|min:0',
        ]);

        $asignatura->update([
            'idtit' => $request->idtit,
            'idniv' => $request->idniv,
            'nombreasi' => $request->nombreasi,
            'teoricosasi' => $request->teoricosasi,
            'practicosasi' => $request->practicosasi,
        ]);

        return redirect()->route('asignaturas.index')->with('success', 'Asignatura actualizada correctamente.');
    }

    // Eliminar una asignatura
    public function destroy($idasi)
    {
        $asignatura = Asignatura::findOrFail($idasi);
        $asignatura->delete();

        return redirect()->route('asignaturas.index')->with('success', 'Asignatura eliminada correctamente.');
    }
}
