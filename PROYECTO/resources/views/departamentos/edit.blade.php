<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar departamento</title>
</head>
<body>
    <h2>Editar Departamento</h2>

    <form action="{{ route('departamentos.update', $departamento->iddep) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nombredep">Nombre:</label>
        <input type="text" name="nombredep" value="{{ $departamento->nombredep }}" maxlength="50" required>

        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('departamentos.index') }}">← Volver</a>
     <a href="{{ route('admin.index') }}">Cancelar</a>
</body>
</html>