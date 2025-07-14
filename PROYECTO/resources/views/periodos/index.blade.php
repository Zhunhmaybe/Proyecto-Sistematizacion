<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Periodos</title>
    <link rel="stylesheet" href="{{asset('css/Periodos/index.css')}}">
</head>
<body>
    <div class="container">
        <h1>Listado de Periodos</h1>

        @if(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif

        <a href="{{ route('periodos.create') }}"><button class="btn btn-primary">Nuevo Periodo</button></a>

        <table border="1" cellpadding="10" cellspacing="0" style="margin-top: 20px; width: 100%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Detalle</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($periodos as $periodo)
                    <tr>
                        <td>{{ $periodo->idper }}</td>
                        <td>{{ $periodo->detalleper }}</td>
                        <td>{{ $periodo->inicioper }}</td>
                        <td>{{ $periodo->finper }}</td>
                        <td>
                            <a href="{{ route('periodos.edit', $periodo->idper) }}"><button class="edit"> Editar</button></a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5">No hay periodos registrados.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div>
            <a href="{{ route('admin.index') }}"><button class="close">Salir</button></a>
        </div>
    </div>
    
</body>
</html>
