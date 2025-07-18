<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProAsi;
use App\Models\Profesor; // Cambiar User por Profesor
use App\Models\Asignatura;
use Illuminate\Support\Str;
use App\Models\Area;

class ProAsiController extends Controller
{
    // Mostrar todas las asignaciones
    public function index()
    {
        // Incluye profesor, su área y la asignatura
        $asignaciones = ProAsi::with(['profesor.area', 'asignatura'])->get();
        return view('pro_asi.index', compact('asignaciones'));
    }

    // Mostrar formulario de asignación
    public function create()
    {
        // Obtener todos los profesores con su área
        $profesores = Profesor::with('area')->get();
        $asignaturas = []; // Se cargan dinámicamente según el profesor

        return view('pro_asi.create', compact('profesores', 'asignaturas'));
    }

    // Guardar la asignación
    public function store(Request $request)
    {
        $request->validate([
            'idpro' => 'required|exists:profesores,idpro', // Cambiar tabla a profesores
            'idasi' => 'required|exists:asignaturas,idasi',
        ]);

        // Verificar si ya existe la asignación
        $existeAsignacion = ProAsi::where('idpro', $request->idpro)
            ->where('idasi', $request->idasi)
            ->exists();

        if ($existeAsignacion) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Esta asignación ya existe.');
        }

        $idpro_asi = strtoupper(Str::random(8));

        ProAsi::create([
            'idpro_asi' => $idpro_asi,
            'idpro' => $request->idpro,
            'idasi' => $request->idasi,
        ]);

        return redirect()->route('pro_asi.index')->with('success', 'Asignación creada correctamente.');
    }

    // Obtener asignaturas según el área del docente
    // En el método getAsignaturasPorDocente del controlador
    public function getAsignaturasPorDocente($idpro)
    {
        try {
            // Obtener el profesor con su área
            $profesor = Profesor::with('area')->findOrFail($idpro);

            // Verificar si tiene área asignada
            if (!$profesor->area) {
                return response()->json([
                    'success' => false,
                    'message' => 'El profesor no tiene área asignada.',
                    'asignaturas' => []
                ]);
            }

            // Obtener todas las asignaturas (ya que no hay relación directa con área)
            $todasAsignaturas = Asignatura::with(['titulacion', 'nivel'])->get();

            // Obtener las asignaturas ya asignadas a este profesor
            $asignaturasYaAsignadas = ProAsi::where('idpro', $idpro)
                ->pluck('idasi')
                ->toArray();

            // Filtrar asignaturas disponibles (no asignadas a este profesor)
            $asignaturasDisponibles = $todasAsignaturas->filter(function ($asignatura) use ($asignaturasYaAsignadas) {
                return !in_array($asignatura->idasi, $asignaturasYaAsignadas);
            });

            // Formatear las asignaturas
            $asignaturasFormateadas = $asignaturasDisponibles->map(function ($asignatura) {
                return [
                    'idasi' => $asignatura->idasi,
                    'nombreasi' => $asignatura->nombreasi,
                    'codigo' => $asignatura->idasi, // Usar el ID como código
                    'titulacion' => $asignatura->titulacion ? $asignatura->titulacion->nombre : 'Sin titulación',
                    'nivel' => $asignatura->nivel ? $asignatura->nivel->nombre : 'Sin nivel'
                ];
            });

            return response()->json([
                'success' => true,
                'area' => $profesor->area->nombreare,
                'asignaturas' => $asignaturasFormateadas->values()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener las asignaturas: ' . $e->getMessage(),
                'asignaturas' => []
            ]);
        }
    }

    // Eliminar una asignación
    public function destroy($id)
    {
        $asignacion = ProAsi::findOrFail($id);
        $asignacion->delete();

        return redirect()->route('pro_asi.index')->with('success', 'Asignación eliminada correctamente.');
    }
}
