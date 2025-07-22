<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorías disponibles</title>
    <link rel="stylesheet" href="{{ asset('css/Estudiantes/index.css') }}">
</head>
<body>
    <h1>Tutorías disponibles</h1>

    {{-- Mensajes flash --}}
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    @if(session('mensaje'))
        <div style="color: orange;">{{ session('mensaje') }}</div>
    @endif

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Día</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Detalle</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tutorias as $tutoria)
                <tr>
                    <td>{{ $tutoria->horario->dia->nombredia ?? 'Sin día' }}</td>
                    <td>{{ $tutoria->horario->horaini }}</td>
                    <td>{{ $tutoria->horario->horafin }}</td>
                    <td>{{ $tutoria->detalletut }}</td>
                    <td>
@php
    $yaInscrito = \App\Models\InscripcionTutoria::where('idest', session('idest'))
        ->where('idtut', $tutoria->idtut)
        ->exists();
@endphp


                        @if($yaInscrito)
                            <span style="color: green;">✅ Ya inscrito</span>
                        @else
                            <form method="POST" action="{{ route('estudiante.tutorias.inscribirse') }}">
                                @csrf
                                <input type="hidden" name="idtut" value="{{ $tutoria->idtut }}">
                                <button type="submit" class="volver">Inscribirme</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <a href="{{ route('estudiante.dashboard') }}">
        <button class="volver">Volver</button>
    </a>
</body>
</html>
