@extends('layouts.app')

@section('content')
    <h1>Lista de Matrículas</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID Matrícula</th>
                <th>Estudiante</th>
                <th>Periodo</th>
                <th>Fecha de Matrícula</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matriculas as $matricula)
                <tr>
                    <td>{{ $matricula->idmat }}</td>
                    <td>{{ $matricula->estudiante->nombre }}</td>
                    <td>{{ $matricula->periodo->nombre }}</td>
                    <td>{{ $matricula->fechamat }}</td>
                    <td>
                        <a href="{{ route('matriculas.edit', $matricula->idmat) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('matriculas.destroy', $matricula->idmat) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('matriculas.create') }}" class="btn btn-primary">Nueva Matrícula</a>
@endsection
