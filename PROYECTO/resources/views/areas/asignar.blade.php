@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Asignar Área a Docente</h2>

        @if(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('guardar.asignacion.area') }}">
            @csrf

            <div>
                <label for="idpro">Docente:</label>
                <select name="idpro" required>
                    <option value="">-- Selecciona un docente --</option>
                    @foreach ($profesores as $profesor)
                        <option value="{{ $profesor->idpro }}">
                            {{ $profesor->nombrespro }} {{ $profesor->apellidopro }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="idare">Área:</label>
                <select name="idare" required>
                    <option value="">-- Selecciona un área --</option>
                    @foreach ($areas as $area)
                        <option value="{{ $area->idare }}">{{ $area->nombreare }}</option>
                    @endforeach
                </select>
            </div>

            <br>
            <button type="submit">Asignar Área</button>
        </form>

        <hr>

        <h3>Asignaciones Actuales</h3>
        <table border="1" cellpadding="6">
            <thead>
                <tr>
                    <th>Docente</th>
                    <th>Área Asignada</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profesores as $profesor)
                    <tr>
                        <td>{{ $profesor->nombrespro }} {{ $profesor->apellidopro }}</td>
                        <td>{{ $profesor->area ? $profesor->area->nombreare : 'Sin área' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
