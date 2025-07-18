<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Matricula</title>
</head>
<body>
    <form action="{{ route('estudiante.matricula') }}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="idest">Estudiante</label>
        <input type="text" name="idest" class="form-control" value="{{ $estudiante->idest }}" readonly required>
    </div>
    <div class="form-group mb-3">
        <label for="idper">Periodo</label>
        <select name="idper" class="form-control" required>
            <option value="">Seleccione un periodo</option>
            @foreach($periodos as $periodo)
                <option value="{{ $periodo->idper }}">{{ $periodo->detalleper }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mb-3">
        <label for="asignaturas">Asignaturas</label>
        <select name="asignaturas[]" class="form-control" multiple required>
            @foreach($asignaturas as $asignatura)
                <option value="{{ $asignatura->idasi }}">{{ $asignatura->nombreasi }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Matricular</button>
</form>
</body>
</html>


