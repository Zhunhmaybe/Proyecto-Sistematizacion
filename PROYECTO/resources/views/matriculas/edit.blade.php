@extends('layouts.app')

@section('content')
    <h1>Editar Matrícula</h1>

    <form action="{{ route('matriculas.update', $matricula->idmat) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="idest">Estudiante</label>
            <select name="idest" class="form-control" required>
                <option value="">Seleccione un estudiante</option>
                @foreach($estudiantes as $estudiante)
                    <option value="{{ $estudiante->idest }}" {{ $matricula->idest == $estudiante->idest ? 'selected' : '' }}>{{ $estudiante->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="idper">Periodo</label>
            <select name="idper" class="form-control" required>
                <option value="">Seleccione un periodo</option>
                @foreach($periodos as $periodo)
                    <option value="{{ $periodo->idper }}" {{ $matricula->idper == $periodo->idper ? 'selected' : '' }}>{{ $periodo->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="fechamat">Fecha de Matrícula</label>
            <input type="date" name="fechamat" class="form-control" value="{{ $matricula->fechamat }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar Matrícula</button>
    </form>
@endsection
