<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Día</title>
    <link rel="stylesheet" href="{{ asset('/css/Dias/edit.css') }}">
</head>
<body>
    
    <h1 class="mb-4">Editar Día</h1>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('dias.update', $dia->iddia) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="nombredia">Nombre del Día</label>
                <input type="text" name="nombredia" class="form-control" value="{{ old('nombredia', $dia->nombredia) }}" required maxlength="20">
            </div>
            <button type="submit" class="update">Actualizar</button>
            <a href="{{ route('dias.index') }}"><button class="volver">Volver</button></a>
        </form>
        <a href="{{ route('admin.index') }}"><button class="cancel">Cancelar</button></a>
    </div>
    
</body>
</html>