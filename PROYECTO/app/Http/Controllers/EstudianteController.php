<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;
use App\Models\Usuario;
use App\Models\Matricula;
use App\Models\Detallematricula;
use App\Models\Asignatura;
use Illuminate\Support\Str;

class EstudianteController extends Controller
{
    public function dashboard()
    {
        $usuario = session('usuario');

        if (!$usuario || $usuario->idrol != 2) { // 2 = Estudiante
            return redirect()->route('login.form')->withErrors(['access' => 'Acceso no autorizado']);
        }

        $usuario = Usuario::with('rol', 'area')->find($usuario->idusu);

        // Obtener el periodo activo
        $periodoActivo = Periodo::whereDate('inicioper', '<=', now())
            ->whereDate('finper', '>=', now())
            ->first();

        // Verificar si ya está matriculado en ese periodo
        $matriculado = false;
        if ($periodoActivo) {
            $matriculado = \App\Models\Matricula::where('idper', $periodoActivo->idper)
                ->where('idusu', $usuario->idusu)
                ->exists();
        }

        return view('estudiante', compact('usuario', 'periodoActivo', 'matriculado'));
    }


    public function mostrarFormularioMatricula()
    {
        $usuario = session('usuario');

        if (!$usuario || $usuario->idrol != 2) {
            return redirect()->route('login.form')->withErrors(['access' => 'Acceso denegado']);
        }

        $periodoActivo = Periodo::whereDate('inicioper', '<=', now())
            ->whereDate('finper', '>=', now())
            ->first();

        $asignaturas = Asignatura::all();

        if (!$periodoActivo) {
            return view('estudiante')->with(['mensaje' => 'No hay un periodo activo.']);
        }

        return view('estudiante.matricula', compact('periodoActivo', 'asignaturas'));
    }

public function procesarMatricula(Request $request)
{
    $request->validate([
        'idper' => 'required|exists:periodos,idper',
        'asignaturas' => 'required|array|min:1',
    ]);

    $usuario = session('usuario');

    if (!$usuario || $usuario->idrol != 2) {
        return redirect()->route('login.form')->withErrors(['access' => 'Acceso denegado']);
    }

    // Obtener el periodo seleccionado
    $periodo = Periodo::findOrFail($request->idper);

    // Crear matrícula
    $matricula = Matricula::create([
        'idmat' => Str::uuid(),
        'idper' => $periodo->idper,
        'idusu' => $usuario->idusu,
        'fechamat' => now(),
    ]);

    foreach ($request->asignaturas as $asignaturaId) {
        Detallematricula::create([
            'iddet' => Str::uuid(),
            'idasi' => $asignaturaId,
            'idmat' => $matricula->idmat,
            'detalledet' => 'Matrícula regular',
        ]);
    }

    return redirect()->route('estudiante.dashboard')->with('success', 'Matrícula realizada correctamente.');
}

}
