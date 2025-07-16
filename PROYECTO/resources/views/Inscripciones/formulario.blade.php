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
    <h2 class="titulo-formulario">Formulario de Inscripción - {{ $carrera ?? '' }}</h2>
    <h2 class="titulo-formulario">Formulario de Registro de Usuario</h2>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 1em;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf

        <label for="idusu">Cédula:</label>
        <input type="text" name="idusu" maxlength="10" value="{{ old('idusu') }}" required>

        <label for="nombredusu">Nombre:</label>
        <input type="text" name="nombredusu" maxlength="50" value="{{ old('nombredusu') }}" required>

        <label for="apellidousu">Apellido:</label>
        <input type="text" name="apellidousu" maxlength="50" value="{{ old('apellidousu') }}" required>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required>

        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" maxlength="100" value="{{ old('email') }}" required>

        <label for="fechanacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fechanacimiento" value="{{ old('fechanacimiento') }}" required>

        {{-- Campo oculto para idare opcional --}}
        <input type="hidden" name="idare" value="">

        <label for="idrol">Rol:</label>
        <select name="idrol" required>
            <option value="" disabled {{ old('idrol') ? '' : 'selected' }}>Seleccione un rol</option>
            <option value="0" {{ old('idrol') == '0' ? 'selected' : '' }}>Admin</option>
            <option value="1" {{ old('idrol') == '1' ? 'selected' : '' }}>Docente</option>
            <option value="2" {{ old('idrol') == '2' ? 'selected' : '' }}>Estudiante</option>
        </select>

        <button type="submit">Registrar</button>

    </form>

    <a href="{{ route('usuarios.index') }}">Usuarios</a>
</body>
</html>