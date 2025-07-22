<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Estudiante</title>
    <link rel="stylesheet" href="{{ asset('css/Estudiantes/dashboard.css') }}">
</head>
<body>
    <div class="container">
        <h1>Bienvenido Estudiante, {{ $usuario->nombredusu }}</h1>

        {{-- Mensajes flash --}}
        @if (session('success'))
            <div class="alert alert-success">{!! session('success') !!}</div>
        @endif

        @if (session('mensaje'))
            <div class="alert alert-warning">{!! session('mensaje') !!}</div>
        @endif

        {{-- Mostrar periodo activo --}}
        <p><strong>Periodo Activo:</strong> {{ $periodoActivo ? $periodoActivo->detalleper : 'No hay un periodo activo' }}</p>

        {{-- Botón para formulario matrícula --}}
        @if ($periodoActivo)
            <p>Para matricularte, por favor selecciona las asignaturas disponibles.</p>
            <a href="{{ route('estudiante.matricula') }}">
                <button class="ir">Ir al formulario de matrícula</button>
            </a>
        @endif

        <hr>

        {{-- Historial de asignaturas matriculadas --}}
        @if ($asignaturasMatriculadas->isNotEmpty())
            <h4>Historial de asignaturas matriculadas:</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Asignatura</th>
                        <th>Periodo</th>
                        <th>Detalle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($asignaturasMatriculadas as $detalle)
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

        <hr>
        
@if($tutoriasInscritas->isNotEmpty())
    <h4>Tutorías en las que estás inscrito:</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Inscripción</th>

            </tr>
        </thead>
        <tbody>
            @foreach($tutoriasInscritas as $inscripcion)
                <tr>
                    <td>{{ $inscripcion->id ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>    
    </table>
@else
    <p>No estás inscrito en ninguna tutoría aún.</p>
@endif



        <a href="{{ route('estudiante.tutorias') }}">
            <button class="cerrar">Seleccionar Tutorías</button>
        </a>

        <a href="{{ route('login.form') }}">
            <button class="cerrar">Cerrar sesión</button>
        </a>
    </div>
</body>
</html>
