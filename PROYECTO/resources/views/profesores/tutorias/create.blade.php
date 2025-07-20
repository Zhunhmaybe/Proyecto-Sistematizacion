<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="{{asset('css/Profesores/Tutorias/create.css')}}">
    <title>Crear Tutoria</title>
</head>
<body>
    <div class="container">
    <h1>Crear Tutoría Profesores</h1>
    <form action="{{ route('profesores.tutorias.index') }}" method="POST">
        @csrf

        <label for="iddet">Asignatura (Detalle Matrícula):</label>
        <select name="iddet" required>
            @foreach($detallematriculas as $detalle)
                <option value="{{ $detalle->iddet }}">
                    {{ $detalle->asignatura->nombreasi ?? 'Asignatura no encontrada' }}
                </option>
            @endforeach
        </select><br>

        <label for="idhor">Horario:</label>
        <select name="idhor" required>
            @foreach($horarios as $horario)
                <option value="{{ $horario->idhor }}">
                    {{ $horario->dia->nombredia ?? 'Día desconocido' }} - {{ $horario->horainicio }} a {{ $horario->horafin }}
                </option>
            @endforeach
        </select><br>

        <label for="detalletut">Detalle:</label>
        <input type="text" name="detalletut" maxlength="100" required><br>

        <button type="submit" class="save">Guardar Tutoría</button>
    </form>
      <a href="{{ route('profesores.tutorias.index') }}"><button class="volver">Volver</button></a>
     <a href="{{ route('profesor.dashboard') }}"><button class="cancel">Cancelar</button></a>
     </div>
</body>
</html>