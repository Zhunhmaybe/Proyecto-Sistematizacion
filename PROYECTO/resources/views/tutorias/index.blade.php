<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tutorias</title>
    <link rel="stylesheet" href="{{asset('css/Tutorias/index.css')}}">
</head>
<body>
    <div class="container">
    <h1 class="mb-4">Listado de Tutorías</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('tutorias.create') }}"><button class="crear">Crear nueva tutoría</button></a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Detalle Matrícula</th>
                <th>Horario</th>
                <th>Detalle Tutoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tutorias as $tutoria)
                <tr>
                    <td>{{ $tutoria->idtut }}</td>
                    <td>{{ $tutoria->detallematricula->iddet ?? 'N/A' }}</td>
                    <td>
                        {{ $tutoria->horario->dia->nombredia ?? 'Sin día' }} -
                        {{ $tutoria->horario->horaini ?? '' }} a {{ $tutoria->horario->horafin ?? '' }}
                    </td>
                    <td>{{ $tutoria->detalletut }}</td>
                    <td>
                        <a href="{{ route('tutorias.edit', $tutoria->idtut) }}"><button class="edit">Editar</button></a>
                        <form action="{{ route('tutorias.destroy', $tutoria->idtut) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="eliminar" onclick="return confirm('¿Deseas eliminar esta tutoría?')">Eliminar</button>
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