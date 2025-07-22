<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mis Tutorias</title>
</head>
<body>
    <h2>Mis Tutorías Inscritas</h2>

@if($tutoriasInscritas->isEmpty())
    <p>No estás inscrito en ninguna tutoría.</p>
@else
    <table>
        <thead>
            <tr>
                <th>Tutoría</th>
                <th>Profesor</th>
                <th>Día</th>
                <th>Hora</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tutoriasInscritas as $inscripcion)
                <tr>
                    <td>{{ $inscripcion->tutoria?->detalletut }}</td>
                    <td>{{ $inscripcion->tutoria?->profesor?->nombrespro }}</td>
                    <td>{{ $inscripcion->tutoria?->horario?->dia?->nombredia }}</td>
                    <td>{{ $inscripcion->tutoria?->horario?->horaini }} - {{ $inscripcion->tutoria?->horario?->horafin }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

</body>
</html>