<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profesor</title>
</head>
<body>
    <h1>Lista de Profesores</h1>

<a href="{{ route('profesores.create') }}">+ Nuevo Profesor</a>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Fecha Nacimiento</th>
            <th>Área</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($profesores as $profesor)
            <tr>
                <td>{{ $profesor->idpro }}</td>
                <td>{{ $profesor->nombrespro }}</td>
                <td>{{ $profesor->apellidopro }}</td>
                <td>{{ $profesor->correopro }}</td>
                <td>{{ $profesor->fechanacimientopro }}</td>
                <td>{{ $profesor->area->nombreare ?? 'Sin área' }}</td>
                <td>
                    <a href="{{ route('profesores.edit', $profesor->idpro) }}">Editar</a>
                    <form action="{{ route('profesores.destroy', $profesor->idpro) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Eliminar este profesor?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
