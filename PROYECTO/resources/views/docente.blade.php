<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Docente</title>
</head>
<body>
        <h1>Bienvenido</h1>

    @php
        $docente = session('usuario');
    @endphp

    @if ($docente)
        <div style="margin-bottom: 20px;">
            <h3>Perfil:</h3>
            <p><strong>Nombre:</strong> {{ $docente->nombredusu }} {{ $docente->apellidousu }}</p>
            <p><strong>Email:</strong> {{ $docente->email }}</p>
            <p><strong>Área:</strong> {{ $docente->area->nombreare ?? 'No asignada' }}</p>
        </div>
    @endif


   <a href="{{ route('logout') }}">Cerrar Sesion</a>
</body>
</html>