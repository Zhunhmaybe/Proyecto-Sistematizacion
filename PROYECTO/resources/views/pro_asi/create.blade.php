<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asignaturas</title>
</head>
<body>
    <h1>Asignar Materias a un Profesor</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('pro_asi.store') }}">
        @csrf

        <label for="idpro">Profesor:</label>
        <select name="idpro" required>
            <option value="">Seleccione un profesor</option>
            @foreach($profesores as $profesor)
                <option value="{{ $profesor->idpro }}">{{ $profesor->nombrespro }} {{ $profesor->apellidopro }}</option>
            @endforeach
        </select>

        <br><br>

        <label for="idasis">Asignaturas:</label><br>
        @foreach($asignaturas as $asignatura)
            <input type="checkbox" name="idasis[]" value="{{ $asignatura->idasi }}">
            {{ $asignatura->nombreasi }}<br>
        @endforeach

        <br>

        <button type="submit">Asignar Materias</button>
    </form>
</body>
</html>