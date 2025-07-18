<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;
use App\Models\User;
use App\Models\Estudiante;
use App\Models\Matricula;
use App\Models\Detallematricula;
use App\Models\Asignatura;
use Illuminate\Support\Str;

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
        if ($periodoActivo && $estudiante) {
            $matriculado = Matricula::where('idper', $periodoActivo->idper)
                ->where('idest', $estudiante->idest)
                ->exists();
        }

        return view('estudiante.dashboard', compact('usuario', 'periodoActivo', 'matriculado'));
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
        // Obtener todos los periodos disponibles
        $periodos = Periodo::all();

        $asignaturas = Asignatura::all(); // Obtener todas las asignaturas disponibles

        // Obtener el estudiante logueado
        $estudiante = Estudiante::where('mailest', $usuario->email)->first();
        if (!$estudiante) {
            return back()->withErrors(['estudiante' => 'Estudiante no encontrado.']);
        }
        $usuario = session('usuario');

        if (!$periodoActivo) {
            return view('estudiante.matricula')->with(['mensaje' => 'No hay un periodo activo.']);
        }

        return view('estudiante.matricula', compact('periodoActivo','periodos', 'asignaturas','estudiante'));
    }

   public function procesarMatricula(Request $request)
    {
        $request->validate([
            'idper' => 'required|exists:periodos,idper',
            'asignaturas' => 'required|array|min:1',
            'idest' => 'required|exists:estudiantes,idest', // Validar que el estudiante existe
        ]);

        // Obtener los datos del estudiante logueado
        $usuario = session('usuario');
        $estudiante = Estudiante::where('mailest', $usuario->email)->first();

        $periodo = Periodo::findOrFail($request->idper);

        // Generar un ID para la matrícula
        $ultimoMatricula = Matricula::orderBy('idmat', 'desc')->first();
        $ultimoNumero = $ultimoMatricula ? (int) substr($ultimoMatricula->idmat, 3) : 0;
        $nuevoIdMat = 'MAT' . str_pad($ultimoNumero + 1, 3, '0', STR_PAD_LEFT);

        // Crear la matrícula
        $matricula = Matricula::create([
            'idmat' => $nuevoIdMat,
            'idper' => $periodo->idper,
            'idest' => $estudiante->idest,
            'fechamat' => now(),
        ]);

        // Asignar las asignaturas seleccionadas a la matrícula
        foreach ($request->asignaturas as $asignaturaId) {
            Detallematricula::create([
                'idasi' => $asignaturaId,
                'idmat' => $matricula->idmat,
                'detalledet' => 'Matrícula regular',
            ]);
        }

        return redirect()->route('estudiante.dashboard')->with('success', 'Matrícula realizada correctamente.');
    }


}
