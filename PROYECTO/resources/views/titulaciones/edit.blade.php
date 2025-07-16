<!DOCTYPE html>
<html>
<head>
    <title>Editar Titulación</title>
</head>
<body>
    <h1>Editar Titulación: {{ $titulacion->detalletit }}</h1>

    <a href="{{ route('titulacion.index') }}">Volver al listado</a>

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

        <label>Detalle de Titulación:</label>
        <input type="text" name="detalletit" value="{{ $titulacion->detalletit }}" required><br><br>

        <label>Nivel de Titulación:</label>
        <input type="text" name="nivelestit" value="{{ $titulacion->nivelestit }}" required><br><br>

        <button type="submit">Actualizar</button>
            <a href="{{ route('admin.index') }}">Salir</a>
    </form>
</body>
</html>
