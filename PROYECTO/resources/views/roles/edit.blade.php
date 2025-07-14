<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Rol</title>
    <link rel="stylesheet" href="{{asset('css/Roles/edit.css')}}">
</head>
<body>
    <div class="container">
        <h1>Editar Rol</h1>

        @if($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('roles.update', $rol->idrol) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="idrol">ID del Rol:</label>
            <input type="text" name="idrol" value="{{ $rol->idrol }}" disabled>

            <label for="detalle">Detalle:</label>
            <input type="text" name="detalle" value="{{ old('detalle', $rol->detalle) }}" required>

            <button type="submit" class="save">Guardar Cambios</button>
            <a href="{{ route('roles.index') }}"><button class="volver">Volver</button></a>
        </form>
    </div>
    <a href="{{ route('admin.index') }}"><button class="close">Salir</button></a>
</body>
</html>
    

