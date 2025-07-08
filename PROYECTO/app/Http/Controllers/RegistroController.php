<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Area;
use App\Models\User;
use App\Models\Profesor;
use App\Models\Estudiante;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    // Mostrar todos los usuarios
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    // 2. Mostrar formulario de registro
    /*public function create()
    {
        return view('usuarios.create');
    }*/

    // Mostrar formulario para editar un usuario
    public function edit($idusu)
    {
        $usuario = User::findOrFail($idusu);
        return view('usuarios.edit', compact('usuario'));
    }

    public function show($idusu)
    {
        $usuario = User::with('rol')->findOrFail($idusu);
        return view('usuarios.show', compact('usuario'));
    }

    // Actualizar usuario
    public function update(Request $request, $idusu)
    {
        $usuario = User::findOrFail($idusu);

        $validated = $request->validate([
            'nombredusu'      => 'required|max:50',
            'apellidousu'     => 'required|max:50',
            'contrasena'      => 'nullable|min:6',
            'email'           => 'required|email|max:100',
            'fechanacimiento' => 'required|date',
            'idrol'           => 'required|in:1,2',
        ]);

        $
        // Actualizar los datos básicos de usuario
        $usuario->nombredusu      = $validated['nombredusu'];
        $usuario->apellidousu     = $validated['apellidousu'];
        $usuario->email           = $validated['email'];
        $usuario->fechanacimiento = $validated['fechanacimiento'];
        $usuario->idrol           = $validated['idrol'];
        // Si se quiere actualizar la contraseña:
        if (!empty($validated['contrasena'])) {
            $usuario->contrasena = bcrypt($validated['contrasena']);
        }
        $usuario->save();

        // Actualizar registros relacionados según el rol
        if ($usuario->idrol == 1) {
            // Si es profesor, actualiza o crea en profesores
            Profesor::updateOrCreate(
                ['idpro' => $usuario->idusu],
                [
                    'idpro'              => $usuario->idusu,
                    'idare'              => $validated['idare'] ?? null,
                    'nombrespro'         => $validated['nombredusu'],
                    'apellidopro'        => $validated['apellidousu'],
                    'correopro'          => $validated['email'],
                    'fechanacimientopro' => $validated['fechanacimiento'],
                ]
            );
            // Borra registro en estudiantes si antes era estudiante
            //Estudiante::where('idest', $usuario->idusu)->delete();
        } elseif ($usuario->idrol == 2) {
            // Si es estudiante, actualiza o crea en estudiantes
            Estudiante::updateOrCreate(
                ['idest' => $usuario->idusu],
                [
                    'idest'         => $usuario->idusu,
                    'nombrest'      => $validated['nombredusu'],
                    'apellidost'    => $validated['apellidousu'],
                    'direccionest'  => $validated['direccionest'] ?? '',
                    'mailest'       => $validated['email'],
                    'nacimientoest' => $validated['fechanacimiento'],
                ]
            );
            // Borra registro en profesores si antes era profesor
            //Profesor::where('idpro', $usuario->idusu)->delete();
        }
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'idusu' => 'required|max:10',
            'nombredusu' => 'required|max:50',
            'apellidousu' => 'required|max:50',
            'contrasena' => 'required|min:6',
            'email' => 'required|email|max:100',
            'fechanacimiento' => 'required|date',
            'idrol' => 'required|in:0,1,2',
        ]);

        $User = User::create([
            'idusu'           => $request->idusu, // Este campo es OBLIGATORIO
            'nombredusu'      => $request->nombredusu,
            'apellidousu'     => $request->apellidousu,
            'contrasena'      => bcrypt($request->contrasena),
            'email'           => $request->email,
            'fechanacimiento' => $request->fechanacimiento,
            'idrol'           => $request->idrol,
        ]);


        if($validated['idrol']==1){
            Profesor::create([
                'idpro'              => $User->idusu, // Igual que el id del usuario
                'idare'              => null, // Puede ser null
                'nombrespro'         => $validated['nombredusu'],
                'apellidopro'        => $validated['apellidousu'],
                'correopro'          => $validated['email'],
                'fechanacimientopro' => $validated['fechanacimiento'],
            ]);
        }
        else if ($validated['idrol'] == 2) {
            Estudiante::create([
                'idest'         => $User->idusu,                    // Igual que el id del usuario
                'nombreest'      => $validated['nombredusu'],
                'apellidoest'    => $validated['apellidousu'],
                'mailest'       => $validated['email'],
                'nacimientoest' => $validated['fechanacimiento'],
            ]);
        }

        return redirect()->back()->with('success', 'Usuario registrado con éxito.');
    }
}
