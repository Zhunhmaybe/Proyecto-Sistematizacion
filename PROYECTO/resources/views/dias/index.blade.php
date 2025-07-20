<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Días</title>
     <link rel="stylesheet" href="{{ asset('/css/Dias/index.css') }}">
</head>
<body>
    <div class="container">
    <h1 class="mb-4">Listado de Días</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('dias.create') }}"><button class="create">Crear nuevo día</button></a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Día</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dias as $dia)
                <tr>
                    <td>{{ $dia->iddia }}</td>
                    <td>{{ $dia->nombredia }}</td>
                    <td>
                        <a href="{{ route('dias.edit', $dia->iddia) }}"><button class="editar">Editar</button></a>
                        <form action="{{ route('dias.destroy', $dia->iddia) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="eliminar" onclick="return confirm('¿Estás seguro de eliminar este día?')">Eliminar</button>
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