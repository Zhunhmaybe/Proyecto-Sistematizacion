<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Rol</title>
</head>
<body>
    <div class="container">
    <h2>Crear Nuevo Rol</h2>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 1rem;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="idrol">ID del Rol</label>
            <input type="text" name="idrol" id="idrol" class="form-control" value="{{ old('idrol') }}" maxlength="10" required>
        </div>

        <div class="form-group" style="margin-top: 1rem;">
            <label for="detalle">Detalle</label>
            <input type="text" name="detalle" id="detalle" class="form-control" value="{{ old('detalle') }}" maxlength="50" required>
        </div>

        <div style="margin-top: 1.5rem;">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Volver</a>
                <a href="{{ route('admin.index') }}">Salir</a>
        </div>
    </form>
</div>
</body>
</html>