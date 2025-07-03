<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Departamentos</title>
</head>
<body>
    <h1>Departamentos</h1>
    
    <a href="{{ route('departamentos.create') }}">➕ Crear nuevo</a>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <ul>
        @foreach($departamentos as $dep)
            <li>
                {{ $dep->iddep }} - {{ $dep->nombredep }}
                <a href="{{ route('departamentos.edit', $dep->iddep) }}">✏️ Editar</a>
                <form action="{{ route('departamentos.destroy', $dep->iddep) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">🗑️ Borrar</button>
                </form>
            </li>
        @endforeach
    </ul>
     <a href="{{ route('admin.index') }}">Cancelar</a>
</body>
</html>