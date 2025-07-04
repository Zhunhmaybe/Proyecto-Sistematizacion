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
   <h1>Panel de Administración</h1>

    <div class="admin-container">

        <div class="admin-section">
            <div class="section-title">Acciones Rápidas</div>
            <div class="button-group">
                <a href="{{ route('departamentos.create') }}" class="admin-button">➕ Crear Departamentos</a>
                <a href="{{ route('areas.create') }}" class="admin-button">➕ Crear Área</a>
                <a href="{{ route('periodos.create') }}" class="admin-button">📆 Añadir Período</a>
                <a href="{{ route('roles.index') }}" class="admin-button">👥 Ver Roles</a>
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
                            <th>Total Registrados</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Usuarios</td>
                    <td>
                        {{ $totalUsuarios }} 
                        <a href="{{ route('usuarios.index') }}">Ver Usuarios</a>
                    </td>
                        </tr>
                        <tr>
                            <td>Áreas</td>
                            <td>{{ $totalAreas }}</td>
                        </tr>
                        <tr>
                            <td>Roles</td>
                            <td>{{ $totalRoles }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <a href="{{ route('logout') }}">Cerrar Sesion</a>
</body>
</html>