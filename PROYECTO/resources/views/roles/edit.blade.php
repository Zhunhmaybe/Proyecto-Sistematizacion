<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2>Editar Rol</h2>

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

            <br><br>

            <label for="detalle">Detalle:</label>
            <input type="text" name="detalle" value="{{ old('detalle', $rol->detalle) }}" required>

            <br><br>

            <button type="submit">Guardar Cambios</button>
            <a href="{{ route('roles.index') }}">Volver</a>
        </form>
    </div>
    <a href="{{ route('admin.index') }}">Salir</a>
</body>
</html>
    

