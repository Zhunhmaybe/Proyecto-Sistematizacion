<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use App\Models\Area;
use App\Models\Tutoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Detallematricula;
use App\Models\Departamento;
use App\Models\Horario;

class ProfesorController extends Controller
{
    // Mostrar todos los profesores
    public function index()
    {
        $profesores = Profesor::with('area.departamento')->get();
        return view('profesor.index', compact('profesores'));
    }
    // Mostrar formulario de creación
    public function create()
    {
        $areas = Area::all();
        $departamentos = Departamento::all();
        return view('profesor.create', compact('areas', 'departamentos'));
    }

    public function dashboard()
    {
        $usuario = session('usuario');

        // Verificar que esté autenticado y sea un docente
        if (!$usuario || $usuario->idrol != 1) {
            return redirect()->route('login.form')->withErrors(['access' => 'Acceso no autorizado']);
        }

        // Cargar el profesor con sus relaciones
        $profesor = Profesor::with([
            'area.departamento',
            'proasi.asignatura'
        ])->where('idpro', $usuario->idusu)->first();

        if (!$profesor) {
            return redirect()->route('login.form')->withErrors(['access' => 'Profesor no registrado.']);
        }

        // Obtener las tutorías del docente
        $tutorias = Tutoria::all();

        // Convertir tutorías en eventos para el calendario
        $eventos = $tutorias->map(function ($tutoria) {
            return [
                'title' => $tutoria->titulo ?? 'Tutoría',
                'start' => $tutoria->fecha . 'T' . $tutoria->hora_inicio,
                'end' => $tutoria->fecha . 'T' . $tutoria->hora_fin,
            ];
        });

        return view('profesor', compact('usuario', 'profesor', 'eventos'));
    }



    // Guardar un nuevo profesor
    public function store(Request $request)
    {
        $request->validate([
            'idpro' => 'required|max:10|unique:profesores,idpro',
            'nombrespro' => 'required|max:50',
            'apellidopro' => 'required|max:50',
            'correopro' => 'required|email|max:100',
            'fechanacimientopro' => 'required|date',
            'idare' => 'required|exists:areas,idare',
        ]);

        Profesor::create($request->only([
            'idpro',
            'nombrespro',
            'apellidopro',
            'correopro',
            'fechanacimientopro',
            'idare'
        ]));

        return redirect()->route('profesor.index')->with('success', 'Profesor registrado correctamente.');
    }

    // Mostrar formulario de edición
    public function edit($idpro)
    {
        $profesor = Profesor::findOrFail($idpro);
        $departamentos = Departamento::all();
        $areas = Area::all();
        return view('profesor.edit', compact('profesor', 'departamentos', 'areas'));
    }

    // Actualizar profesor existente
    public function update(Request $request, $idpro)
    {
        $profesor = Profesor::findOrFail($idpro);

        $request->validate([
            'nombrespro' => 'required|max:50',
            'apellidopro' => 'required|max:50',
            'correopro' => 'required|email|max:100',
            'fechanacimientopro' => 'required|date',
            'idare' => 'required|exists:areas,idare',
        ]);

        $profesor->update($request->only([
            'nombrespro',
            'apellidopro',
            'correopro',
            'fechanacimientopro',
            'idare'
        ]));

        return redirect()->route('profesor.index')->with('success', 'Profesor actualizado correctamente.');
    }

    public function createFromProfesor()
    {
        $usuario = session('usuario');

        if (!$usuario || $usuario->idrol != 1) {
            return redirect()->route('login.form')->withErrors(['access' => 'Acceso no autorizado']);
        }

        $detallematriculas = Detallematricula::all();
        $horarios = Horario::all();

        return view('profesores.tutorias.create', compact('detallematriculas', 'horarios', 'usuario'));
    }


    public function storeFromProfesor(Request $request)
    {
        $usuario = session('usuario');

        if (!$usuario || $usuario->idrol != 1) {
            return redirect()->route('login.form')->withErrors(['access' => 'Acceso no autorizado']);
        }

        $validated = $request->validate([
            'iddet' => 'required|exists:detallematriculas,iddet',
            'idhor' => 'required|exists:horarios,idhor',
            'detalletut' => 'required|max:100',
        ]);

        $existe = Tutoria::where('idhor', $validated['idhor'])->exists();

        if ($existe) {
            return redirect()->back()->withErrors(['idhor' => 'Este horario ya está asignado a otra tutoría.'])->withInput();
        }

        Tutoria::create([
            'iddet' => $validated['iddet'],
            'idhor' => $validated['idhor'],
            'detalletut' => $validated['detalletut'],
        ]);

        return redirect()->route('profesores.tutorias.index')->with('success', 'Tutoría creada con éxito.');
    }

    public function misTutorias()
    {
        $usuario = session('usuario');

        if (!$usuario || $usuario->idrol != 1) {
            return redirect()->route('login.form')->withErrors(['access' => 'Acceso no autorizado']);
        }

        $tutorias = Tutoria::with(['detallematricula', 'horario'])->get();

        return view('profesores.tutorias.index', compact('tutorias', 'usuario'));
    }


    // Eliminar profesor
    public function destroy($idpro)
    {
        $profesor = Profesor::findOrFail($idpro);
        $profesor->delete();

        return redirect()->route('profesor.index')->with('success', 'Profesor eliminado correctamente.');
    }
}
