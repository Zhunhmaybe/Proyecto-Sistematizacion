<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edicion Horario</title>
</head>
<body>
    <div class="container">
    <h1 class="mb-4">Editar Horario</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('horarios.update', $horario->idhor) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="iddia">Día</label>
            <select name="iddia" class="form-control" required>
                @foreach($dias as $dia)
                    <option value="{{ $dia->iddia }}" {{ $horario->iddia == $dia->iddia ? 'selected' : '' }}>
                        {{ $dia->nombredia }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="horaini">Hora de Inicio</label>
            <input type="time" name="horaini" class="form-control" value="{{ old('horaini', $horario->horaini) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="horafin">Hora de Fin</label>
            <input type="time" name="horafin" class="form-control" value="{{ old('horafin', $horario->horafin) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
 <a href="{{ route('admin.index') }}">Cancelar</a>
</body>
</html>