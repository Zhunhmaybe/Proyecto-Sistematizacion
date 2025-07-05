<!DOCTYPE html>
<html>
<head>
    <title>Crear Nivel</title>
</head>
<body>
    <h1>Crear un nuevo Nivel</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('niveles.store') }}" method="POST">
        @csrf
        <label for="idniv">ID del Nivel:</label>
        <input type="text" name="idniv" id="idniv" maxlength="10" required><br><br>

        <label for="nombreniv">Nombre del Nivel:</label>
        <input type="text" name="nombreniv" id="nombreniv" maxlength="30" required><br><br>

        <button type="submit">Guardar Nivel</button>
    </form>

    <p><a href="{{ route('niveles.index') }}">← Volver al listado</a></p>
        <a href="{{ route('logout') }}">Cerrar Sesion</a>
</body>
</html>
