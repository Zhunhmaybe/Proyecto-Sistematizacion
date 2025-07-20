<!DOCTYPE html>
<html>
<head>
    <title>Editar Asignatura</title>
    <link rel="stylesheet" href="{{ asset('/css/Asignaturas/edit.css') }}">
</head>
<body>
    <h1>Editar Asignatura: {{ $asignatura->nombreasi }}</h1>
    <div class="container">
        <a href="{{ route('asignatura.index') }}"><button class="volver">Volver al listado</button></a>

        @if ($errors->any())
            <div style="color:red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('asignaturas.update', $asignatura->idasi) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Titulación:</label>
            <select name="idtit" required>
                <option value="">-- Seleccione una titulación --</option>
                @foreach ($titulaciones as $tit)
                    <option value="{{ $tit->idtit }}" {{ $asignatura->idtit == $tit->idtit ? 'selected' : '' }}>{{ $tit->detalletit }}</option>
                @endforeach
            </select><br><br>

            <label>Nivel:</label>
            <select name="idniv" required>
                <option value="">-- Seleccione un nivel --</option>
                @foreach ($niveles as $niv)
                    <option value="{{ $niv->idniv }}" {{ $asignatura->idniv == $niv->idniv ? 'selected' : '' }}>{{ $niv->nombreniv }}</option>
                @endforeach
            </select><br><br>

            <label>Nombre de la asignatura:</label>
            <input type="text" name="nombreasi" value="{{ $asignatura->nombreasi }}" required><br><br>

            <label>Horas teóricas:</label>
            <input type="number" name="teoricosasi" value="{{ $asignatura->teoricosasi }}" min="0" required><br><br>

            <label>Horas prácticas:</label>
            <input type="number" name="practicosasi" value="{{ $asignatura->practicosasi }}" min="0" required><br><br>

            <button type="submit" class="update">Actualizar</button>
        </form>
        <a href="{{ route('admin.index') }}"><button class="salir">Salir</button></a>
    </div>
</body>
</html>