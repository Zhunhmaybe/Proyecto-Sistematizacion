<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Periodo</title>
</head>
<body>
     <div class="container">
        <h2>Editar Periodo</h2>

        @if($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('periodos.update', $periodo->idper) }}" method="POST">
            @csrf
            @method('PUT')

            <label>ID del Periodo:</label>
            <input type="text" name="idper" value="{{ $periodo->idper }}" disabled><br><br>

            <label>Detalle:</label>
            <input type="text" name="detalleper" value="{{ old('detalleper', $periodo->detalleper) }}" required><br><br>

            <label>Fecha de Inicio:</label>
            <input type="date" name="inicioper" value="{{ old('inicioper', $periodo->inicioper) }}" required><br><br>

            <label>Fecha de Fin:</label>
            <input type="date" name="finper" value="{{ old('finper', $periodo->finper) }}" required><br><br>

            <button type="submit">Actualizar</button>
            <a href="{{ route('periodos.index') }}">Volver</a>
             <a href="{{ route('admin.index') }}">Salir</a>
        </form>
    </div>
</body>
</html>