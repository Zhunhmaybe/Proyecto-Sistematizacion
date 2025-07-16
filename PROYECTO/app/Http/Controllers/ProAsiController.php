<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProAsi;
use App\Models\User;
use App\Models\Asignatura;
use Illuminate\Support\Str;

class ProAsiController extends Controller
{
    // Mostrar todas las asignaciones
    public function index()
    {
        $asignaciones = ProAsi::with(['profesor', 'asignatura'])->get();
        return view('pro_asi.index', compact('asignaciones'));
    }

    // Mostrar formulario de asignación

    public function create()
    {
        $profesores = User::where('idrol', 1)->get();
        $asignaturas = Asignatura::all();

        return view('pro_asi.create', compact('profesores', 'asignaturas'));
    }


    // Guardar la asignación
    public function store(Request $request)
    {
        $request->validate([
            'idpro' => 'required|exists:profesores,idpro',
            'idasi' => 'required|exists:asignaturas,idasi',
        ]);


        // Generar ID único para la tabla pro_asi
        $idpro_asi = strtoupper(Str::random(8));

        ProAsi::create([
            'idpro_asi' => $idpro_asi,
            'idpro' => $request->idpro,
            'idasi' => $request->idasi,
        ]);

        return redirect()->route('pro_asi.index')->with('success', 'Asignación creada correctamente.');
    }

    // Eliminar una asignación
    public function destroy($id)
    {
        $asignacion = ProAsi::findOrFail($id);
        $asignacion->delete();

        return redirect()->route('pro_asi.index')->with('success', 'Asignación eliminada correctamente.');
    }
}
