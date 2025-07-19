<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel del Profesor</title>
</head>
<body>
    <h1>Bienvenido, {{ $usuario->nombredusu }}</h1>

    <h2>Área asignada:</h2>
    <p>{{ $profesor->area->nombreare ?? 'No asignada' }}</p>

    <h2>Asignaturas que imparte:</h2>
    @if ($profesor->proasi->isEmpty())
        <p>No tiene asignaturas asignadas.</p>
    @else
        <ul>
            @foreach ($profesor->proasi as $asignacion)
                <li>{{ $asignacion->asignatura->nombreasi ?? 'Asignatura no encontrada' }}</li>
            @endforeach
        </ul>
    @endif

<a href="{{ route('profesores.tutorias.index') }}">Ver mis Tutorías</a>

    <a href="{{ route('profesores.tutorias.create') }}" class="admin-button"> Crear Tutoría</a>

        <a href="{{ route('logout') }}">Cerrar Sesion</a>
</body>
</html>
