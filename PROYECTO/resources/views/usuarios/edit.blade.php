<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="{{ asset('/css/Usuarios/edit.css') }}">
</head>
<body>
    <div class="container">
    <h1>Editar Usuario: {{ $usuario->nombredusu }} {{ $usuario->apellidousu }}</h1>

    <form action="{{ route('usuarios.update', $usuario->idusu) }}" method="POST">
        @csrf
        @method('PUT')


        <label>Cedula:</label>
        <input type="text" value="{{ $usuario->idusu }}" disabled>

        <label>Nombre:</label>
        <input type="text" name="nombredusu" value="{{ $usuario->nombredusu }}" required>

        <label>Apellido:</label>
        <input type="text" name="apellidousu" value="{{ $usuario->apellidousu }}" required>

        <label>Email:</label>
        <input type="email" name="email" value="{{ $usuario->email }}" required>


        <label>Rol:</label>
        <select name="idrol" id="idrol" required onchange="mostrarOcultarArea()">
            <option value="0" {{ $usuario->idrol == '0' ? 'selected' : '' }}>Admin</option>
            <option value="1" {{ $usuario->idrol == '1' ? 'selected' : '' }}>Docente</option>
            <option value="2" {{ $usuario->idrol == '2' ? 'selected' : '' }}>Estudiante</option>
        </select>
        <label>Fecha de nacimiento:</label>
        <input type="date" name="fechanacimiento" value="{{ $usuario->fechanacimiento }}" required>
        


        <div id="areaDocente" style="display: {{ $usuario->idrol == '1' ? 'block' : 'none' }};">
            <label>Área:</label>
            <select name="idare">
                <option value="">-- Seleccione un área --</option>
                @if(isset($areas) && count($areas) > 0)
                    @foreach ($areas as $area)
                        <option value="{{ $area->idare }}" {{ $usuario->idare == $area->idare ? 'selected' : '' }}>
                            {{ $area->nombreare }}
                        </option>
                    @endforeach
                @else
                    <option value="">No hay áreas disponibles</option>
                @endif
            </select>
        </div>

        <button type="submit" class="update">Actualizar</button>
    </form>
        <a href="{{ route('admin.index') }}"><button class="salir">Salir</button></a>
    </div>
    <script>
        function mostrarOcultarArea() {
            const rol = document.getElementById('idrol').value;
            const areaDiv = document.getElementById('areaDocente');
            if (rol === '1') {
                areaDiv.style.display = 'block';
            } else {
                areaDiv.style.display = 'none';
            }
        }
    </script>
</body>
</html>
