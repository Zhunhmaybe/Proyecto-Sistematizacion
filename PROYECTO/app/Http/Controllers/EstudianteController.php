<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;
use App\Models\User;
use App\Models\Estudiante;
use App\Models\Matricula;
use App\Models\Detallematricula;
use App\Models\Asignatura;
use App\Models\Titulacion; // Agregar el modelo Titulacion
use Illuminate\Support\Str;
use App\Http\Controllers\Log;

class EstudianteController extends Controller
{
    public function dashboard()
    {
        $usuario = session('usuario');

        if (!$usuario || $usuario->idrol != 2) {
            return redirect()->route('login.form')->withErrors(['access' => 'Acceso no autorizado']);
        }

        $estudiante = Estudiante::where('mailest', $usuario->email)->first();
        $periodoActivo = Periodo::whereDate('inicioper', '<=', now())
            ->whereDate('finper', '>=', now())
            ->first();

        $matriculado = false;
        $asignaturasMatriculadas = collect();

        if ($estudiante) {
            $matriculas = Matricula::where('idest', $estudiante->idest)
                ->with(['detallematriculas.asignatura', 'periodo'])
                ->get();

            foreach ($matriculas as $matricula) {
                if ($matricula->idper === $periodoActivo?->idper) {
                    $matriculado = true;
                }

                foreach ($matricula->detallematriculas as $detalle) {
                    $detalle->periodo = $matricula->periodo;
                    $asignaturasMatriculadas->push($detalle);
                }
            }
        }

        return view('estudiante.dashboard', compact(
            'usuario',
            'periodoActivo',
            'matriculado',
            'asignaturasMatriculadas'
        ));
    }

    public function mostrarFormularioMatricula()
    {
        $usuario = session('usuario');

        if (!$usuario || $usuario->idrol != 2) {
            return redirect()->route('login.form')->withErrors(['access' => 'Acceso denegado']);
        }

        // Obtener el periodo activo
        $periodoActivo = Periodo::whereDate('inicioper', '<=', now())
            ->whereDate('finper', '>=', now())
            ->first();

        if (!$periodoActivo) {
            return view('estudiante.matricula')->with(['mensaje' => 'No hay un periodo activo.']);
        }

        // Obtener todos los periodos y titulaciones disponibles
        $periodos = Periodo::all();
        $titulaciones = Titulacion::all(); // Obtener todas las titulaciones
        $matriculado = false;

        // Obtener el estudiante logueado
        $estudiante = Estudiante::where('mailest', $usuario->email)->first();
        if (!$estudiante) {
            return back()->withErrors(['estudiante' => 'Estudiante no encontrado.']);
        }

        $asignaturasMatriculadas = collect();

        if ($periodoActivo && $estudiante) {
            $matriculas = Matricula::where('idest', $estudiante->idest)
                ->with(['detallematriculas.asignatura', 'periodo'])
                ->get();

            foreach ($matriculas as $matricula) {
                foreach ($matricula->detallematriculas as $detalle) {
                    $detalle->periodo = $matricula->periodo;
                    $asignaturasMatriculadas->push($detalle);
                }
            }
        }

        return view('estudiante.matricula', compact(
            'usuario',
            'periodoActivo',
            'matriculado',
            'asignaturasMatriculadas',
            'titulaciones', // Pasar titulaciones en lugar de asignaturas
            'periodos',
            'estudiante'
        ));
    }

    // Nuevo método para obtener asignaturas por titulación via AJAX
    public function obtenerAsignaturasPorTitulacion(Request $request)
    {
        try {
            // Validar la entrada
            $request->validate([
                'idtit' => 'required|exists:titulaciones,idtit'
            ]);

            // Obtener las asignaturas con información adicional
            $asignaturas = Asignatura::where('idtit', $request->idtit)
                ->select('idasi', 'nombreasi')
                ->orderBy('nombreasi', 'asc')
                ->get();

            // Verificar si se encontraron asignaturas
            if ($asignaturas->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No se encontraron asignaturas para esta titulación.',
                    'asignaturas' => []
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Asignaturas obtenidas correctamente.',
                'asignaturas' => $asignaturas,
                'total' => $asignaturas->count()
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {


            return response()->json([
                'success' => false,
                'message' => 'Error interno del servidor.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function procesarMatricula(Request $request)
    {
        $request->validate([
            'idper' => 'required|exists:periodos,idper',
            'asignaturas' => 'required|array|min:1',
            'idest' => 'required|exists:estudiantes,idest',
        ]);

        $usuario = session('usuario');
        $estudiante = Estudiante::where('mailest', $usuario->email)->first();
        $periodo = Periodo::findOrFail($request->idper);

        // Buscar si ya tiene matrícula en ese periodo
        $matricula = Matricula::where('idest', $estudiante->idest)
            ->where('idper', $periodo->idper)
            ->first();

        // Si no tiene, crear una nueva
        if (!$matricula) {
            $ultimoMatricula = Matricula::orderBy('idmat', 'desc')->first();
            $ultimoNumero = $ultimoMatricula ? (int) substr($ultimoMatricula->idmat, 3) : 0;
            $nuevoIdMat = 'MAT' . str_pad($ultimoNumero + 1, 3, '0', STR_PAD_LEFT);

            $matricula = Matricula::create([
                'idmat' => $nuevoIdMat,
                'idper' => $periodo->idper,
                'idest' => $estudiante->idest,
                'fechamat' => now(),
            ]);
        }

        $mensajes = [];
        $agregadas = [];

        foreach ($request->asignaturas as $idasi) {
            // Verificar si ya existe esa asignatura en la matrícula actual
            $yaExiste = Detallematricula::where('idmat', $matricula->idmat)
                ->where('idasi', $idasi)
                ->exists();

            if ($yaExiste) {
                $asignatura = Asignatura::find($idasi);
                $mensajes[] = "Ya estás matriculado en la asignatura: {$asignatura->nombreasi}";
            } else {
                Detallematricula::create([
                    'idasi' => $idasi,
                    'idmat' => $matricula->idmat,
                    'detalledet' => 'Matrícula regular',
                ]);
                $agregadas[] = $idasi;
            }
        }

        if (empty($agregadas)) {
            return redirect()->route('estudiante.dashboard')->with('mensaje', implode('<br>', $mensajes));
        }

        $mensajeFinal = 'Asignaturas matriculadas correctamente.';
        if (!empty($mensajes)) {
            $mensajeFinal .= '<br>' . implode('<br>', $mensajes);
        }

        return redirect()->route('estudiante.dashboard')->with('success', $mensajeFinal);
    }
}
