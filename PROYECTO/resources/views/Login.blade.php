<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1 class="login-title">Bienvenido</h1>
            <p class="login-subtitle">Inicia sesión</p>
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

        <form class="login-form" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label class="form-label" for="email">Correo electrónico</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="form-input" 
                    placeholder="ejemplo@email.com"
                    required
                >
            </div>

            <div class="form-group" style="position: relative;">
                <label class="form-label" for="password">Contraseña</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="form-input" 
                    placeholder="Ingresa tu contraseña"
                    required
                >
                <span class="password-toggle" onclick="togglePassword()">👁️</span>
            </div>

            <div class="forgot-password">
                <a href="#" onclick="alert('Funcionalidad de recuperación en desarrollo.')">¿Olvidaste tu contraseña?</a>
            </div>

            <button type="submit" class="login-button">
                Iniciar Sesión
            </button>
        </form>

        <div class="register-link">
            ¿No tienes cuenta? <a href="/register" onclick="alert('Redirigiendo a registro...')">Regístrate aquí</a>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.password-toggle');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                toggleIcon.textContent = '👁️';
            }
        }

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
