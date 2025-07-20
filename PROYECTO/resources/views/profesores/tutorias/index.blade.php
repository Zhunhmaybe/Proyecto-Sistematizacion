<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mis tutorias</title>
    <link rel="stylesheet" href="{{asset('css/Profesores/Tutorias/index.css')}}">
</head>
<body>
    <div class="container">
    <h1>Mis Tutorías Programadas</h1>

    <a href="{{ route('profesores.tutorias.create') }}"><button class="crear">Crear Tutoría</button></a>

    <table border="1">
        <thead>
            <tr>
                <th>Día</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Detalle</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tutorias as $tutoria)
                <tr>
                    <td>{{ $tutoria->horario->dia->nombredia ?? 'Sin día' }}</td>
                    <td>{{ $tutoria->horario->horaini }}</td>
                    <td>{{ $tutoria->horario->horafin }}</td>
                    <td>{{ $tutoria->detalletut }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No tienes tutorías programadas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('profesor.dashboard') }}"><button class="volver">Volver</button></a>
    </div>
</body>
</html>