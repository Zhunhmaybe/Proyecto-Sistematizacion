<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Horarios</title>
</head>
<body>
    <div class="container">
    <h1 class="mb-4">Listado de Horarios</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('horarios.create') }}" class="btn btn-primary mb-3">Crear nuevo horario</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Día</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($horarios as $horario)
                <tr>
                    <td>{{ $horario->idhor }}</td>
                    <td>{{ $horario->dia->nombredia ?? 'Sin día' }}</td>
                    <td>{{ $horario->horaini }}</td>
                    <td>{{ $horario->horafin }}</td>
                    <td>
                        <a href="{{ route('horarios.edit', $horario->idhor) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('horarios.destroy', $horario->idhor) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este horario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
 <a href="{{ route('admin.index') }}">Cancelar</a>
</body>
</html>