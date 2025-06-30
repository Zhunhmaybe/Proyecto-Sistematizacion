<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>
</head>
<body>
    <h2>Editar Usuario: {{ $usuario->nombredusu }} {{ $usuario->apellidousu }}</h2>

    <form action="{{ route('usuarios.update', $usuario->idusu) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nombre:</label>
        <input type="text" name="nombredusu" value="{{ $usuario->nombredusu }}" required><br>

        <label>Apellido:</label>
        <input type="text" name="apellidousu" value="{{ $usuario->apellidousu }}" required><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ $usuario->email }}" required><br>

        <label>Fecha de Nacimiento:</label>
        <input type="date" name="fechanacimiento" value="{{ $usuario->fechanacimiento }}" required><br>

<label>Área (opcional):</label>
<select name="idare">
    <option value="">-- Seleccione un área (opcional) --</option>
    @foreach ($areas as $area)
        <option value="{{ $area->idare }}" {{ $usuario->idare == $area->idare ? 'selected' : '' }}>
            {{ $area->nombre }}
        </option>
    @endforeach
</select>

        <label>Rol:</label>
        <select name="idrol" required>
            <option value="0" {{ $usuario->idrol == '0' ? 'selected' : '' }}>Usuario</option>
            <option value="1" {{ $usuario->idrol == '1' ? 'selected' : '' }}>Moderador</option>
            <option value="2" {{ $usuario->idrol == '2' ? 'selected' : '' }}>Administrador</option>
        </select><br><br>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
