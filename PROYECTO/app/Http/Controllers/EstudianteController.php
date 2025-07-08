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

        $estudiante = Estudiante::where('mailest', $usuario->email)->first(); // o usar idusu si está en la tabla estudiantes

        $periodoActivo = Periodo::whereDate('inicioper', '<=', now())
            ->whereDate('finper', '>=', now())
            ->first();

        $matriculado = false;
        if ($periodoActivo && $estudiante) {
            $matriculado = Matricula::where('idper', $periodoActivo->idper)
                ->where('idest', $estudiante->idest)
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

        $estudiante = Estudiante::where('mailest', $usuario->email)->first(); // o usar idusu
        if (!$estudiante) {
            return back()->withErrors(['estudiante' => 'No se encontró el estudiante.']);
        }

        $periodo = Periodo::findOrFail($request->idper);

        $matricula = Matricula::create([
            'idmat' => Str::uuid(),
            'idper' => $periodo->idper,
            'idest' => $estudiante->idest, // ya no idusu
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
