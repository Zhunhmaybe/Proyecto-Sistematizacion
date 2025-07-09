<!DOCTYPE html>
<html>
<head>
    <title>Crear Asignatura</title>
</head>
<body>
    <h1>Crear Nueva Asignatura</h1>

    <a href="{{ route('asignatura.index') }}">Volver al listado</a>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('asignaturas.store') }}" method="POST">
        @csrf
        
        <label>Id de la asignatura:</label>
        <input type="text" name="idasi" value="{{ old('idasi') }}" required><br><br>

        <label>Titulación:</label>
        <select name="idtit" required>
            <option value="">-- Seleccione una titulación --</option>
            @foreach ($titulaciones as $tit)
               <option value="{{ $tit->idtit }}" {{ old('idtit') == $tit->idtit ? 'selected' : '' }}>{{ $tit->detalletit }}</option>
            @endforeach
        </select><br><br>

        <label>Nivel:</label>
        <select name="idniv" required>
            <option value="">-- Seleccione un nivel --</option>
            @foreach ($niveles as $niv)
                <option value="{{ $niv->idniv }}" {{ old('idniv') == $niv->idniv ? 'selected' : '' }}>{{ $niv->nombreniv }}</option>
            @endforeach
        </select><br><br>

        <label>Nombre de la asignatura:</label>
        <input type="text" name="nombreasi" value="{{ old('nombreasi') }}" required><br><br>

        <label>Horas teóricas:</label>
        <input type="number" name="teoricosasi" value="{{ old('teoricosasi') ?? 0 }}" min="0" required><br><br>

        <label>Horas prácticas:</label>
        <input type="number" name="practicosasi" value="{{ old('practicosasi') ?? 0 }}" min="0" required><br><br>

        <button type="submit">Crear</button>

            <a href="{{ route('admin.index') }}">Salir</a>
    </form>
</body>
</html>
