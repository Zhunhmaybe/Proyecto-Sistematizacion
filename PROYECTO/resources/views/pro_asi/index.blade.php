<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asignaciones</title>
</head>
<body>
    <h2>Asignaciones</h2>

    @if(session('success'))
        <div style="color: green">{{ session('success') }}</div>
    @endif

    <a href="{{ route('pro_asi.create') }}">Nueva Asignación</a>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Profesor</th>
                <th>Área</th>
                <th>Asignatura</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($asignaciones as $asig)
                <tr>
                    <td>
                        {{ $asig->profesor->nombrespro ?? 'Sin nombre' }}
                        {{ $asig->profesor->apellidopro ?? '' }}
                    </td>
                    <td>
                        {{ $asig->profesor->area->nombreare ?? 'No definida' }}
                    </td>
                    <td>
                        {{ $asig->asignatura->nombreasi ?? 'Sin asignatura' }}
                    </td>
                    <td>
                        <form action="{{ route('pro_asi.destroy', $asig->idpro_asi) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <a href="{{ route('admin.index') }}">Salir</a>
</body>
</html>
