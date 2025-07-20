<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Horarios</title>
    <link rel="stylesheet" href="{{asset('css/Horarios/index.css')}}">
</head>
<body>
    <div class="container">
    <h1>Listado de Horarios</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('horarios.create') }}"><button class="crear">Crear nuevo horario</button></a>

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
                        <a href="{{ route('horarios.edit', $horario->idhor) }}"><button  class="edit">Editar</button></a>
                        <form action="{{ route('horarios.destroy', $horario->idhor) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="eliminar" onclick="return confirm('¿Estás seguro de eliminar este horario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.index') }}"><button class="cancel">Cancelar</button></a>
</div>
</body>
</html>