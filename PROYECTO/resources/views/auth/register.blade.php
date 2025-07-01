
<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Registro de Usuario</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="nombredusu" class="form-label">Nombre</label>
                <input type="text" class="form-control @error('nombredusu') is-invalid @enderror" id="nombredusu" name="nombredusu" value="{{ old('nombredusu') }}" required>
                @error('nombredusu')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="apellidousu" class="form-label">Apellido</label>
                <input type="text" class="form-control @error('apellidousu') is-invalid @enderror" id="apellidousu" name="apellidousu" value="{{ old('apellidousu') }}" required>
                @error('apellidousu')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
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
            <div class="mb-3">
                <label for="contrasena_confirmation" class="form-label">Confirmar Contraseña</label>
                <input type="password" class="form-control" id="contrasena_confirmation" name="contrasena_confirmation" required>
            </div>
            <div class="mb-3">
                <label for="fechanacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control @error('fechanacimiento') is-invalid @enderror" id="fechanacimiento" name="fechanacimiento" value="{{ old('fechanacimiento') }}" required>
                @error('fechanacimiento')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="idare" class="form-label">Área (Opcional)</label>
                <select class="form-control @error('idare') is-invalid @enderror" id="idare" name="idare">
                    <option value="">Seleccione un área</option>
                    @foreach($areas as $area)
                        <option value="{{ $area->idare }}" {{ old('idare') == $area->idare ? 'selected' : '' }}>{{ $area->nombreare }}</option>
                    @endforeach
                </select>
                @error('idare')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="idrol" class="form-label">Rol (Opcional)</label>
                <select class="form-control @error('idrol') is-invalid @enderror" id="idrol" name="idrol">
                    <option value="">Seleccione un rol</option>
                    @foreach($roles as $rol)
                        <option value="{{ $rol->idrol }}" {{ old('idrol') == $rol->idrol ? 'selected' : '' }}>{{ $rol->detalle }}</option>
                    @endforeach
                </select>
                @error('idrol')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
            <a href="{{ route('login') }}" class="btn btn-link">Ya tengo una cuenta</a>
        </form>
    </div>
</body>
</html>