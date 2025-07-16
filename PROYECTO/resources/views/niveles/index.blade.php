<!DOCTYPE html>
<html>
<head>
    <title>Niveles</title>
    <link rel="stylesheet" href="{{asset('css/Niveles/index.css')}}">
</head>
<body>
    <div class="container">
        <h1>Listado de Niveles</h1>

        @if(session('success'))
            <p style="color:green;">{{ session('success') }}</p>
        @endif

        <a href="{{ route('niveles.create') }}"><button class="create">Crear nuevo nivel</button></a>

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
        <a href="{{ route('admin') }}"><button class="close">Volver</button></a>
</body>
</html>
