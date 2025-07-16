<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perfil del Profesor</title>
</head>
<body>
<h1>Bienvenido, {{ $usuario->nombredusu }}</h1>

<h2>Área: {{ $profesor->area->nombreare ?? 'No asignada' }}</h2>
<h3>Departamento: {{ $profesor->area->departamento->nombredep ?? 'No asignado' }}</h3>

<h2>Asignaturas que imparte:</h2>
@if ($profesor->proasi->isEmpty())
    <p>No tiene asignaturas asignadas.</p>
@else
    <ul>
        @foreach ($profesor->proasi as $asig)
            <li>{{ $asig->asignatura->nombreasi ?? 'Asignatura no encontrada' }}</li>
        @endforeach
    </ul>
@endif

<a href="{{ route('logout') }}">Cerrar Sesion</a>
</body>
</html>
