<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Día</title>
    <link rel="stylesheet" href="{{ asset('/css/Dias/create.css') }}">
</head>
<body>
    
    <h1 class="mb-4">Crear Día</h1>
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
            <button type="submit" class="guardar">Guardar</button>
            
        </form>
        <a href="{{ route('dias.index') }}"><button class="ver">Ver Días</button></a> <br></br>
        <a href="{{ route('admin.index') }}"><button class="cancel">Cancelar</button></a>
    </div>
    
</body>
</html>