<!DOCTYPE html>
<html>
<head>
    <title>Editar Carrera</title>
    <link rel="stylesheet" href="{{ asset('css/Titulaciones/edit.css') }}">
</head>
<body>
    <h1>Editar Carrera: {{ $titulacion->detalletit }}</h1>
    <div class="container">
    <a href="{{ route('titulacion.index') }}"><button class="volver">Volver al listado</button></a>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('titulaciones.update', $titulacion->idtit) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Detalle de Carrera:</label>
        <input type="text" name="detalletit" value="{{ $titulacion->detalletit }}" required><br><br>

        <label>Niveles de Carrera:</label>
        <input type="text" name="nivelestit" value="{{ $titulacion->nivelestit }}" required><br><br>

        <button type="submit" class="update">Actualizar</button>
    </form>
    <a href="{{ route('admin.index') }}"><button class="salir">Salir</button></a>
    </div>
</body>
</html>
