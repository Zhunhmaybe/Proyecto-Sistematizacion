<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Roles</title>
    <link rel="stylesheet" href="{{asset('css/Roles/index.css')}}">
</head>
<body>
    
    <div class="container">
        <h1>Lista de Roles</h1>

        @if(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif

        <table border="1" cellpadding="10" cellspacing="0" style="margin-top: 20px; width: 100%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Detalle</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $rol)
                    <tr>
                        <td>{{ $rol->idrol }}</td>
                        <td>{{ $rol->detalle }}</td>
                        <td>
                            <a href="{{ route('roles.edit', $rol->idrol) }}"><button class="edit">Editar</button></a>

                            <form action="{{ route('roles.destroy', $rol->idrol) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Estás seguro?')" class="delete">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3">No hay roles registrados.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <a href="{{ route('admin.index') }}"><button class="close">Salir</button></a>
</body>
</html>
