@extends('layouts.app')

@section('content')
    <h1>Bienvenido al Dashboard del Estudiante</h1>


    {{-- Mensaje si viene algo desde el controlador --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (isset($mensaje))
        <div class="alert alert-warning">
            {{ $mensaje }}
        </div>
    @endif
        {{-- Mensajes de éxito --}}
    @if (session('success'))
        <div class="alert alert-success">
            {!! session('success') !!}
        </div>
    @endif

    {{-- Mensajes de advertencia --}}
    @if (session('mensaje'))
        <div class="alert alert-warning">
            {!! session('mensaje') !!}
        </div>
    @endif


    {{-- Mostrar periodo activo --}}
    <p><strong>Periodo Activo:</strong>
        {{ $periodoActivo ? $periodoActivo->detalleper : 'No hay un periodo activo' }}
    </p>

    {{-- Botón para matricularse si hay un periodo activo --}}
    @if ($periodoActivo)
        <p>Para matricularte, por favor selecciona las asignaturas disponibles.</p>
        <a href="{{ route('estudiante.matricula') }}" class="btn btn-primary">Ir al formulario de matrícula</a>
    @endif

    <hr>

    {{-- Mostrar historial completo de asignaturas matriculadas --}}
    @if($asignaturasMatriculadas->isNotEmpty())
        <h4>Historial de asignaturas matriculadas:</h4>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Asignatura</th>
                    <th>Periodo</th>
                    <th>Detalle</th>
                </tr>
            </thead>
            <tbody>
                @foreach($asignaturasMatriculadas as $detalle)
                    <tr>
                        <td>{{ $detalle->asignatura->nombreasi }}</td>
                        <td>{{ $detalle->periodo->detalleper ?? 'Periodo desconocido' }}</td>
                        <td>{{ $detalle->detalledet }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No estás matriculado en ninguna asignatura aún.</p>
    @endif

    <br>
    <a href="{{ route('login.form') }}" class="btn btn-secondary">Cerrar sesión</a>
@endsection
