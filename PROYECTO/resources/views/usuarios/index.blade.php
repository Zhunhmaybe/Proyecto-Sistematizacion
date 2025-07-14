<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="{{asset('css/Usuarios/index.css')}}">
</head>
<body>
    <div class="container">
        <h1>Usuarios Registrados</h1>

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
                        <td>{{ $usuario->rol->detalle ?? 'Sin rol' }}</td>
                        <td>
                            <a href="{{ route('usuarios.edit', $usuario->idusu) }}"><button class="edit">Editar</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('admin.index') }}"><button class="close">Salir</button></a>
    </div>
</body>
</html>
