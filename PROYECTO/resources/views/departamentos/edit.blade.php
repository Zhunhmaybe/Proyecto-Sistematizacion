<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Editar departamento</title>
        <link rel="stylesheet" href="{{ asset('/css/Departamentos/edit.css') }}">
    </head>
    <body>
        <h1>Editar Departamento</h1>

        <form action="{{ route('departamentos.update', $departamento->iddep) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="nombredep">Nombre:</label>
            <input type="text" name="nombredep" value="{{ $departamento->nombredep }}" maxlength="50" required>

            <button type="submit">Actualizar</button>
        </form>

        <div>
            <a href="{{ route('departamentos.index') }}"> 
                <button class="left">Volver</button>
            </a>

            <a href="{{ route('admin.index') }}">
                <button class="cancel">Cancelar</button>
            </a>
        </div>
    </body>
</html>