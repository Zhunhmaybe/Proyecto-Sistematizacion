<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar nuevo Periodo</title>
     <link rel="stylesheet" href="{{asset('css/Periodos/create.css')}}">
</head>
<body>
    <h1>Registrar Nuevo Periodo Académico</h1>
        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div style="color: green;">
                {{ session('success') }}
            </div>
        @endif
        <div class="formulario">
            <form action="{{ route('periodos.store') }}" method="POST">
                @csrf

                <div>
                    <label for="idper">ID del Periodo:</label>
                    <input type="text" name="idper" id="idper" maxlength="10" required>
                </div>

                <div>
                    <label for="detalleper">Detalle del Periodo:</label>
                    <input type="text" name="detalleper" id="detalleper" maxlength="100" required>
                </div>

                <div>
                    <label for="inicioper">Fecha de Inicio:</label>
                    <input type="date" name="inicioper" id="inicioper" required>
                </div>

                <div>
                    <label for="finper">Fecha de Fin:</label>
                    <input type="date" name="finper" id="finper" required>
                </div>

                <div style="margin-top: 1rem;">
                    <button type="submit" class="save">Guardar Periodo</button>

                </div>
            </form>
                <a href="{{ route('periodos.index') }}"><button class="volver">Ver Lista de Periodos</button></a>

                <a href="{{ route('admin.index') }}"><button class="close">Salir</button></a>
        </div>
</body>
</html>