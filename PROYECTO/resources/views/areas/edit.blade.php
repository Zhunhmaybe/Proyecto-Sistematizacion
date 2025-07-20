<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('css/Areas/edit.css')}}">
    <title>Editar Área</title>
</head>
<body>
    <div class="container">
    <h1>Editar Área</h1>

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

        <button type="submit" class="update">Actualizar</button>
    </form>
    <a href="{{ route('areas.index') }}"><button class="volver">Volver</button></a>
    <a href="{{ route('admin.index') }}"><button class="cancel">Cancelar</button></a>
    </div>
</body>
</html>
