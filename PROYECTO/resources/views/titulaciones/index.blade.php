<!DOCTYPE html>
<html>
<head>
    <title>Listado de Carreras</title>
</head>
<body>
    <h1>Carrera</h1>

    <a href="{{ route('titulacion.create') }}">Crear Nueva Carrera</a>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Detalle</th>
                <th>Niveles</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($titulaciones as $tit)
                <tr>
                    <td>{{ $tit->idtit }}</td>
                    <td>{{ $tit->detalletit }}</td>
                    <td>{{ $tit->nivelestit }}</td>
                    <td>
                        <a href="{{ route('titulaciones.edit', $tit->idtit) }}">Editar</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">No hay Carreras registradas.</td></tr>
            @endforelse
        </tbody>
    </table>
        <a href="{{ route('admin.index') }}">Salir</a>
</body>
</html>
