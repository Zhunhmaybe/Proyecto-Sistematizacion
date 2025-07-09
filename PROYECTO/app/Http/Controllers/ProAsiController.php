<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProAsi;
use App\Models\Profesor;
use App\Models\Asignatura;

class ProAsiController extends Controller
{
    // Mostrar el formulario para asignar materias a un profesor
    public function create()
    {
        $profesores = Profesor::all();
        $asignaturas = Asignatura::all();

        return view('pro_asi.create', compact('profesores', 'asignaturas'));
    }

    // Guardar la asignación en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'idpro' => 'required|exists:profesores,idpro',
            'idasis' => 'required|array',
            'idasis.*' => 'exists:asignaturas,idasi',
        ]);

        // Eliminar asignaciones anteriores (opcional, si quieres evitar duplicados)
        ProAsi::where('idpro', $request->idpro)->delete();

        foreach ($request->idasis as $idasi) {
            ProAsi::create([
                'idpro_asi' => uniqid(), // si usas un campo ID personalizado
                'idpro' => $request->idpro,
                'idasi' => $idasi,
            ]);
        }

        return redirect()->route('pro_asi.create')->with('success', 'Materias asignadas al profesor correctamente.');
    }

    // (Opcional) Mostrar lista de asignaciones
    public function index()
    {
        $asignaciones = ProAsi::with('asignatura', 'usuario')->get();
        return view('pro_asi.index', compact('asignaciones'));
    }
}
