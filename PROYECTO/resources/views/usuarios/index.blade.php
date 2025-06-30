<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuarios</title>
</head>
<body>
    <h2>Usuarios Registrados</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Área</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->idusu }}</td>
                    <td>{{ $usuario->nombredusu }}</td>
                    <td>{{ $usuario->apellidousu }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->idare }}</td>
                    <td>{{ $usuario->idrol }}</td>
                    <td>
                        <a href="{{ route('usuarios.edit', $usuario->idusu) }}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
