<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">
    <title>Admin</title>
</head>
<body>
    <div class="navbar-container">
        <div class="logo">
            <img src="{{asset('Imagenes/TUN.jpeg')}}" alt="TUN">
        </div>
        <div class="titulo">
            <h1>Panel de Administración</h1>
        </div>
    </div>

    <div class="admin-container">
                <div class="admin-section">
            <div class="section-title">Acciones Rápidas</div>
            <div class="button-group">
            <a href="{{ route('departamentos.create') }}" class="admin-button">Crear Departamentos</a>
                <a href="{{ route('areas.create') }}" class="admin-button">Crear Área</a>
                <a href="{{ route('periodos.create') }}" class="admin-button">Añadir Período</a>
                <a href="{{ route('roles.index') }}" class="admin-button">Ver Roles</a>
                <a href="{{route('niveles.index')}}" class="admin-button">Ver Niveles</a>            
            </div>
        </div>

        {{-- Aquí podrías incluir tablas o estadísticas si deseas --}}
        <div class="admin-section">
            <div class="section-title">Resumen General</div>
            <div class="table-container">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Entidad</th>
                            <th>Total</th>
                            <th>Registrados</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Usuarios</td>
                            <td>{{ $totalUsuarios }} </td>
                            <td>
                                <a href="{{ route('usuarios.index') }}" class="referencia"><button class="boton">Ver Usuarios</button></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Áreas</td>
                            <td>{{ $totalAreas }}</td>
                            <td>
                                <a href="{{ route('usuarios.index') }}" class="referencia"><button class="boton">Ver Areas</button></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Roles</td>
                            <td>{{ $totalRoles }}</td>
                            <td>
                                <a href="{{ route('usuarios.index') }}" class="referencia"><button class="boton">Ver Roles</button></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <a href="{{ route('logout') }}" class="boton-salir"><button class="left-button">Cerrar Sesion</button></a>
</body>
</html>