<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="{{asset('css/Areas/create.css')}}">
        <title>Registrar Nueva Área</title>
    </head>
    <body>
        <h1>Registrar Nueva Área</h1>

        @if ($errors->any())
            <ul style="color:red;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('areas.store') }}">
            @csrf

            <label for="idare">ID Área:</label>
            <input type="text" name="idare" required><br><br>

            <label for="nombreare">Nombre Área:</label>
            <input type="text" name="nombreare" required><br><br>

            <label for="iddep">Departamento:</label>
            <select name="iddep" required>
                <option value="">Seleccione un departamento</option>
                @foreach($departamentos as $dep)
                    <option value="{{ $dep->iddep }}">{{ $dep->nombredep }}</option>
                @endforeach
            </select><br><br>

            <button type="submit" class="register">Registrar</button>
            
        </form>
        <a href="{{ route('areas.index') }}"><button class="ver-areas">Ver Areas</button></a>
        <a href="{{ route('admin.index') }}"><button class="cancel">Cancelar</button></a>
    </body>
</html>
