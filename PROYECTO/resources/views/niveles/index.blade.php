<!DOCTYPE html>
<html>
<head>
    <title>Niveles</title>
</head>
<body>
    <h1>Listado de Niveles</h1>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('niveles.create') }}">Crear nuevo nivel</a>

    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Nivel</th>
            </tr>
        </thead>
        <tbody>
            @foreach($niveles as $nivel)
                <tr>
                    <td>{{ $nivel->idniv }}</td>
                    <td>{{ $nivel->nombreniv }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
        <a href="{{ route('logout') }}">Cerrar Sesion</a>
</body>
</html>
