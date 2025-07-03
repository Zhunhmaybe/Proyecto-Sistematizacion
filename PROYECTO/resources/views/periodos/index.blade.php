<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Periodos</title>
</head>
<body>
        <div class="container">
        <h2>Listado de Periodos</h2>

        @if(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif

        <a href="{{ route('periodos.create') }}" class="btn btn-primary">➕ Nuevo Periodo</a>

        <table border="1" cellpadding="10" cellspacing="0" style="margin-top: 20px; width: 100%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Detalle</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($periodos as $periodo)
                    <tr>
                        <td>{{ $periodo->idper }}</td>
                        <td>{{ $periodo->detalleper }}</td>
                        <td>{{ $periodo->inicioper }}</td>
                        <td>{{ $periodo->finper }}</td>
                        <td>
                            <a href="{{ route('periodos.edit', $periodo->idper) }}">✏️ Editar</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5">No hay periodos registrados.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
     <a href="{{ route('admin.index') }}">Salir</a>
</body>
</html>
