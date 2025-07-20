<!DOCTYPE html>
<html>
<head>
    <title>Crear Carreras</title>
    <link rel="stylesheet" href="{{asset('css/Titulaciones/create.css')}}">
</head>
<body>
    <h1>Crear Nueva Carreras</h1>
    <div class="container">

    <a href="{{ route('titulacion.index') }}"><button class="volver">Volver al listado</button></a>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('titulaciones.store') }}" method="POST">
        @csrf

        <label>Id Carrera:</label>
        <input type="text" name="idtit" value="{{ old('idtit') }}" required><br><br>

        <label>Detalle de Carrera:</label>
        <input type="text" name="detalletit" value="{{ old('detalletit') }}" required><br><br>

        <label>Nivel de Carrera:</label>
        <input type="text" name="nivelestit" value="{{ old('nivelestit') }}" required><br><br>

        <button type="submit" class="crear">Crear</button>
    </form>
    <a href="{{ route('admin.index') }}"><button class="salir">Salir</button></a>
    </div>
</body>
</html>
