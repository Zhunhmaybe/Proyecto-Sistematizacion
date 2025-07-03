<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Matrícula</title>
</head>
<body>
    <h2>Matrícula - Periodo: {{ $periodoActivo->detalleper }}</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('estudiante.matricula') }}" method="POST">
        @csrf

        <h3>Selecciona las asignaturas:</h3>

        @foreach($asignaturas as $asignatura)
            <label>
                <input type="checkbox" name="asignaturas[]" value="{{ $asignatura->idasi }}">
                {{ $asignatura->nombreasi }}
            </label><br>
        @endforeach

        <button type="submit">Matricularme</button>
    </form>

    <br>
    <a href="{{ route('estudiante.dashboard') }}">← Volver al panel</a>
</body>
</html>
