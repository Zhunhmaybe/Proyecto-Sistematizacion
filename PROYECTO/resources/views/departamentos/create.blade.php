<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear un Departamento</title>
    <link rel="stylesheet" href="{{ asset('/css/Departamentos/create.css') }}">
</head>
<body>
    <h1>Crear Nuevo Departamento</h1>
    <div class="container">
        <form action="{{ route('departamentos.store') }}" method="POST">
            @csrf
            <label for="iddep">Identificación:</label>
            <input type="text" name="iddep" maxlength="10" required>

            <label for="nombredep">Nombre:</label>
            <input type="text" name="nombredep" maxlength="50" required>

            <button type="submit">Guardar</button>
        </form>
        <div class="navegacion">
        <a href="{{ route('departamentos.index') }}" ><button class="register-button">Ver Departamentos</button></a>
        <a href="{{ route('admin.index') }}" ><button class="left-button">Cancelar</button></a>
        </div>
    </div>
</body>
</html>