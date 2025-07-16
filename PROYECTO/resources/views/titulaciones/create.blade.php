<!DOCTYPE html>
<html>
<head>
    <title>Crear Titulación</title>
</head>
<body>
    <h1>Crear Nueva Titulación</h1>

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

    <form action="{{ route('titulaciones.store') }}" method="POST">
        @csrf

        <label>Id titulacion:</label>
        <input type="text" name="idtit" value="{{ old('idtit') }}" required><br><br>

        <label>Detalle de Titulación:</label>
        <input type="text" name="detalletit" value="{{ old('detalletit') }}" required><br><br>

        <label>Nivel de Titulación:</label>
        <input type="text" name="nivelestit" value="{{ old('nivelestit') }}" required><br><br>

        <button type="submit">Crear</button>
            <a href="{{ route('admin.index') }}">Salir</a>
    </form>
</body>
</html>
