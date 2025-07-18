@extends('layouts.app')

@section('content')
    <h2>Iniciar Sesión</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" class="form-input" placeholder="ejemplo@email.com" required>
        </div>

        <div class="form-group mb-3" style="position: relative;">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" class="form-input" placeholder="Ingresa tu contraseña" required>
            <span class="password-toggle" onclick="togglePassword()">👁️</span>
        </div>

        <div class="forgot-password">
            <a href="#" onclick="alert('Funcionalidad de recuperación en desarrollo.')">¿Olvidaste tu contraseña?</a>
        </div>

        <button type="submit" class="login-button">Iniciar Sesión</button>
    </form>

    <div class="register-link">
        ¿No tienes cuenta? <a href="/register">Regístrate aquí</a>
    </div>
@endsection
