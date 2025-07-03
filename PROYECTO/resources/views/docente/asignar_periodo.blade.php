<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Asignar Período</title>
</head>
<body>
    <h2>Asignar Período Académico</h2>

    <form method="POST" action="{{ route('asignar.periodo') }}">
        @csrf

        <label for="periodo">Seleccione el período:</label>
        <select name="periodo" id="periodo" required>
            @foreach ($periodos as $periodo)
                <option value="{{ $periodo->idper }}">
                    {{ $periodo->detalleper }} ({{ $periodo->inicioper }} - {{ $periodo->finper }})
                </option>
            @endforeach
        </select>

        <br><br>
        <button type="submit">Asignar</button>
    </form>

    <br>
    <a href="{{ route('docente.dashboard') }}">🔙 Volver al panel</a>
</body>
</html>
