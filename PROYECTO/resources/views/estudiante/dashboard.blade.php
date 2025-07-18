@extends('layouts.app')

@section('content')
    <h1>Bienvenido al Dashboard del Estudiante</h1>

    @if (isset($mensaje))
        <div class="alert alert-warning">
            {{ $mensaje }}
        </div>
    @endif

    <p>Periodo Activo: {{ $periodoActivo ? $periodoActivo->detalleper : 'No hay un periodo activo' }}</p>

    @if($matriculado)
        <p>Para matricularte, por favor selecciona las asignaturas disponibles.</p>
        <a href="{{ route('estudiante.matricula') }}" class="btn btn-primary">Ir al formulario de matrícula</a>
    @endif

    <br>
    <a href="{{ route('login.form') }}" class="btn btn-secondary">Cerrar sesión</a>
@endsection
