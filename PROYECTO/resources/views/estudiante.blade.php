<!DOCTYPE html>
<html>
<head>
    <title>Panel Estudiante</title>
</head>
<body>
    <h1>Bienvenido, {{ $usuario->nombredusu }}</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p style="color: red;">{{ $error }}</p>
        @endforeach
    @endif

    @if($periodoActivo)
        <h3>Periodo Activo: {{ $periodoActivo->detalleper }}</h3>
        <p>Inicio: {{ $periodoActivo->inicioper }} | Fin: {{ $periodoActivo->finper }}</p>

<a href="{{ route('estudiante.matricula.form') }}">
    <button type="button">Matricularme</button>
</a>

    @else
        <p>No hay periodo activo actualmente.</p>
    @endif

    <br><a href="{{ route('logout') }}">Cerrar sesión</a>
</body>
</html>
