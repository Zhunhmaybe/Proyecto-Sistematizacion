
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{asset('css/Areas/index.css')}}">
        <title>Areas Registradas</title>
    </head>
    <body>
        <div class="container">
            <h1>Áreas Registradas</h1>

            @if(session('success'))
                <div style="color: green;">{{ session('success') }}</div>
            @endif

            <a href="{{ route('areas.create') }}"><button class="new-area">Nueva Área</button></a>

            <table border="1" cellpadding="10" cellspacing="0" style="margin-top: 20px; width: 100%;">
                <thead>
                    <tr>
                        <th>ID Área</th>
                        <th>Nombre Área</th>
                        <th>Departamento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($areas as $area)
                        <tr>
                            <td>{{ $area->idare }}</td>
                            <td>{{ $area->nombreare }}</td>
                            <td>
                                @if($area->departamento)
                                {{ $area->departamento->nombredep }}
                                @else
                                <span style="color: red;">❌ No asignado</span>
                                @endif
                            </td>   
                            <td>
                                <a href="{{ route('areas.edit', $area->idare) }}"><button class="edit">Editar</button></a>

                                <form action="{{ route('areas.destroy', $area->idare) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete" onclick="return confirm('¿Eliminar esta área?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4">No hay áreas registradas.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <a href="{{ route('admin.index') }}"><button class="cancel">Cancelar</button></a>
    </body>
    </html>

