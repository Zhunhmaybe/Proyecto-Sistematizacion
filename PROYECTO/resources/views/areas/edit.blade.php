<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Área</title>
</head>
<body>
    <h2>Editar Área</h2>

    @if ($errors->any())
        <ul style="color:red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('areas.update', $area->idare) }}">
        @csrf
        @method('PUT')

        <label for="nombreare">Nombre Área:</label>
        <input type="text" name="nombreare" value="{{ $area->nombreare }}" required><br><br>

        <label for="iddep">Departamento:</label>
        <select name="iddep" required>
            @foreach($departamentos as $dep)
                <option value="{{ $dep->iddep }}" @if($dep->iddep == $area->iddep) selected @endif>
                    {{ $dep->nombredep }}
                </option>
            @endforeach
        </select><br><br>

        <button type="submit">Actualizar</button>
        <a href="{{ route('areas.index') }}">Volver</a>
         <a href="{{ route('admin.index') }}">Cancelar</a>
    </form>
</body>
</html>
