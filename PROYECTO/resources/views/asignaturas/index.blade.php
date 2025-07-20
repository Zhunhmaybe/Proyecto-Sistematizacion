<!DOCTYPE html>
<html>
<head>
    <title>Listado de Asignaturas</title>
    <link rel="stylesheet" href="{{ asset('/css/Asignaturas/index.css') }}">
</head>
<body>
    <h1>Asignaturas</h1>
    <div class="container">
        <a href="{{ route('asignatura.create') }}"><button class="create">Crear Nueva Asignatura</button></a>

        @if(session('success'))
            <p style="color:green;">{{ session('success') }}</p>
        @endif

        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Titulación</th>
                    <th>Nivel</th>
                    <th>Teóricos</th>
                    <th>Prácticos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($asignaturas as $asi)
                    <tr>
                        <td>{{ $asi->idasi }}</td>
                        <td>{{ $asi->nombreasi }}</td>
                        <td>{{ $asi->titulacion->detalletit ?? 'N/A' }}</td>
                        <td>{{ $asi->nivel->nombreniv ?? 'N/A' }}</td>
                        <td>{{ $asi->teoricosasi }}</td>
                        <td>{{ $asi->practicosasi }}</td>
                        <td>
                            <a href="{{ route('asignaturas.edit', $asi->idasi) }}"><button class="edit">Editar</button></a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7">No hay asignaturas registradas.</td></tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('admin.index') }}"><button class="salir">Salir</button></a>
    </div>
</body>
</html>
