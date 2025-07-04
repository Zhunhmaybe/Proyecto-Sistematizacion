<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nivel;

class NivelController extends Controller
{
    // Mostrar todos los niveles
    public function index()
    {
        $niveles = Nivel::all();
        return view('niveles.index', compact('niveles'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('niveles.create');
    }

    // Guardar nuevo nivel
    public function store(Request $request)
    {
        $request->validate([
            'idniv' => 'required|max:10|unique:niveles,idniv',
            'nombreniv' => 'required|max:30',
        ]);

        Nivel::create([
            'idniv' => $request->idniv,
            'nombreniv' => $request->nombreniv,
        ]);

        return redirect()->route('niveles.index')->with('success', 'Nivel creado correctamente.');
    }
}
