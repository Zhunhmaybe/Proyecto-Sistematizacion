<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear un Departamento</title>
</head>
<body>
     <h2>Crear Nuevo Departamento</h2>

    <form action="{{ route('departamentos.store') }}" method="POST">
        @csrf
        <label for="iddep">ID:</label>
        <input type="text" name="iddep" maxlength="10" required>

        <label for="nombredep">Nombre:</label>
        <input type="text" name="nombredep" maxlength="50" required>

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('departamentos.index') }}">Registro de Departamentos</a>
     <a href="{{ route('admin.index') }}">Cancelar</a>
</body>
</html>