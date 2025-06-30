<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/Inscripciones/Formulario.css')}}">
    <title>Inscripciones</title>
</head>
<body>
    <h2 class="titulo-formulario">Formulario de Inscripción - {{ $carrera }}</h2>
 <h2 class="titulo-formulario">Formulario de Registro de Usuario</h2>

    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf

        <label for="idusu">Cedula:</label>
        <input type="text" name="idusu" maxlength="10" required>

        <label for="nombredusu">Nombre:</label>
        <input type="text" name="nombredusu" maxlength="50" required>

        <label for="apellidousu">Apellido:</label>
        <input type="text" name="apellidousu" maxlength="50" required>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required>

        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" maxlength="100" required>

        <label for="fechanacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fechanacimiento" required>

</select>
        <label for="idrol">Rol:</label>
        <select name="idrol" required>
            <option value="0">Admin</option>
            <option value="1">Docente</option>
            <option value="2">Estudiante</option>
        </select>

        <button type="submit">Registrar</button>

    </form>
<a href="{{route('usuarios.index')}}">Usuarios</a>
</body>
</html>