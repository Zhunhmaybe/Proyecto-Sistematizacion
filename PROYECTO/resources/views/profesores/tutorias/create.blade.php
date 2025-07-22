<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/Profesores/Tutorias/create.css') }}">
    <title>Crear Tutoría</title>
</head>
<body>
    <div class="container">
        <h1>Crear Tutoría Profesores</h1>

        {{-- Mostrar errores de validación --}}
        @if ($errors->any())
            <div class="alert" style="color: red; margin-bottom: 15px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('profesores.tutorias.index') }}" method="POST">
            @csrf

            <label for="iddet">Asignatura (Detalle Matrícula):</label>
            <select name="iddet" required>
                @foreach($detallematriculas as $detalle)
                    <option value="{{ $detalle->iddet }}" {{ old('iddet') == $detalle->iddet ? 'selected' : '' }}>
                        {{ $detalle->asignatura->nombreasi ?? 'Asignatura no encontrada' }}
                    </option>
                @endforeach
            </select><br>

            <label for="idhor">Horario:</label>
            <select name="idhor" required>
                @foreach($horarios as $horario)
                    <option value="{{ $horario->idhor }}" {{ old('idhor') == $horario->idhor ? 'selected' : '' }}>
                        {{ $horario->dia->nombredia ?? 'Día desconocido' }} - {{ $horario->horaini }} a {{ $horario->horafin }}
                    </option>
                @endforeach
            </select><br>

            <label for="detalletut">Detalle:</label>
            <input type="text" name="detalletut" maxlength="100" required value="{{ old('detalletut') }}"><br>

            <button type="submit" class="save">Guardar Tutoría</button>
        </form>

        <a href="{{ route('profesores.tutorias.index') }}"><button class="volver">Volver</button></a>
        <a href="{{ route('profesor.dashboard') }}"><button class="cancel">Cancelar</button></a>
    </div>
</body>
</html>
