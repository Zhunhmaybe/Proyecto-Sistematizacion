<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Horario</title>
    <link rel="stylesheet" href="{{asset('css/Horarios/create.css')}}">
</head>
<body>
    <div class="container">
    <h1 class="mb-4">Crear Horario</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('horarios.store') }}" method="POST">
        @csrf
         <div class="form-group mb-3">
            <label for="idhor">ID Horario</label>
            <input type="text" name="idhor" class="form-control" value="{{ old('idhor') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="iddia">Día</label>
            <select name="iddia" class="form-control" required>
                <option value="">Seleccione un día</option>
                @foreach($dias as $dia)
                    <option value="{{ $dia->iddia }}" {{ old('iddia') == $dia->iddia ? 'selected' : '' }}>
                        {{ $dia->nombredia }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="horaini">Hora de Inicio</label>
            <input type="time" name="horaini" class="form-control" value="{{ old('horaini') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="horafin">Hora de Fin</label>
            <input type="time" name="horafin" class="form-control" value="{{ old('horafin') }}" required>
        </div>

        <button type="submit" class="save">Guardar</button>
    </form>
    <a href="{{ route('horarios.index') }}" ><button class="ver">Ver Horarios</button></a>
    <a href="{{ route('admin.index') }}"><button class="cancel">Cancelar</button></a>
</div>
</body>
</html>