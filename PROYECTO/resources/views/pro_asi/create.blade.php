<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asignar Materia</title>
</head>
<body>
    <h2>Asignar Materia a Profesor</h2>

    @if(session('success'))
        <div style="color: green">{{ session('success') }}</div>
    @endif

    <form action="{{ route('pro_asi.store') }}" method="POST">
        @csrf

        <select name="idpro" required>
    <option value="">Seleccione un profesor</option>
    @foreach($profesores as $profesor)
        <option value="{{ $profesor->idusu }}">{{ $profesor->nombredusu }} {{ $profesor->apellidousu }}</option>
    @endforeach
</select>

<select name="idasi" required>
    <option value="">Seleccione una asignatura</option>
    @foreach($asignaturas as $asignatura)
        <option value="{{ $asignatura->idasi }}">{{ $asignatura->nombreasi }}</option>
    @endforeach
</select>


        <button type="submit">Asignar</button>
    </form> 

    <a href="{{ route('pro_asi.index') }}">Ver Usuarios</a>
       <a href="{{ route('admin.index') }}">Salir</a>
</body>
</html>

    