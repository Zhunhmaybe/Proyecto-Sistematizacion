<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Día</title>
</head>
<body>
    <div class="container">
    <h1 class="mb-4">Crear Día</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dias.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
        <label for="iddia">ID Día</label>
        <input type="text" name="iddia" class="form-control" value="{{ old('iddia') }}" required maxlength="20">
        </div>
        <div class="form-group mb-3">
            <label for="nombredia">Nombre del Día</label>
            <input type="text" name="nombredia" class="form-control" value="{{ old('nombredia') }}" required maxlength="20">
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('dias.index') }}" class="btn btn-secondary">Ver Dias</a>
    </form>
</div>
 <a href="{{ route('admin.index') }}">Cancelar</a>
</body>
</html>