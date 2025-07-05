<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1 class="login-title">Registro</h1>
            <p class="login-subtitle">Crea tu cuenta</p>
        </div>

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color: red;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="success-message" style="color: green;">
                {{ session('success') }}
            </div>
        @endif

        <form class="login-form" method="POST" action="{{ route('usuarios.store') }}">
            @csrf

            <div class="form-group">
                <label class="form-label" for="idusu">Cédula</label>
                <input type="text" id="idusu" name="idusu" class="form-input" maxlength="10" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="nombredusu">Nombre</label>
                <input type="text" id="nombredusu" name="nombredusu" class="form-input" maxlength="50" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="apellidousu">Apellido</label>
                <input type="text" id="apellidousu" name="apellidousu" class="form-input" maxlength="50" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" class="form-input" maxlength="100" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="fechanacimiento">Fecha de nacimiento</label>
                <input type="date" id="fechanacimiento" name="fechanacimiento" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="idrol">Rol</label>
                <select id="idrol" name="idrol" class="form-input" required>
                    <option value="0">Admin</option>
                    <option value="1">Docente</option>
                    <option value="2">Estudiante</option>
                </select>
            </div>

            <button type="submit" class="login-button">Registrarse</button>
        </form>

        <a href="/">Volver</a>
        
        <div class="register-link">
            ¿Ya tienes cuenta? <a href="{{ route('Login') }}">Inicia sesión</a>
        </div>
    </div>

    <script>
        // Animación
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.form-input');
            inputs.forEach((input, index) => {
                input.style.opacity = '0';
                input.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    input.style.transition = 'all 0.5s ease';
                    input.style.opacity = '1';
                    input.style.transform = 'translateY(0)';
                }, 200 + (index * 100));
            });
        });
    </script>
</body>
</html>
