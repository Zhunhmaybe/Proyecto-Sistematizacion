<form action="{{ route('matriculas.store') }}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="idest">Estudiante</label>
        <select name="idest" class="form-control" required>
            <option value="">Seleccione un estudiante</option>
            @foreach($estudiantes as $estudiante)
                <option value="{{ $estudiante->idest }}">{{ $estudiante->nombreest }}</option>
            @endforeach
        </select>
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
