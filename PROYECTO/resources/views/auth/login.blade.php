<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Iniciar Sesión</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <input type="password" class="form-control @error('contrasena') is-invalid @enderror" id="contrasena" name="contrasena" required>
                @error('contrasena')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            <a href="{{ route('register') }}" class="btn btn-link">No tengo una cuenta</a>
        </form>
    </div>
</body>
</html>