<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h1 class="mb-4">Editar Tutoría</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('tutorias.update', $tutoria->idtut) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="iddet">Detalle Matrícula</label>
            <select name="iddet" class="form-control" required>
                @foreach($detallematriculas as $detalle)
                    <option value="{{ $detalle->iddet }}" {{ $tutoria->iddet == $detalle->iddet ? 'selected' : '' }}>
                        {{ $detalle->iddet }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="idhor">Horario</label>
            <select name="idhor" class="form-control" required>
                @foreach($horarios as $horario)
                    <option value="{{ $horario->idhor }}" {{ $tutoria->idhor == $horario->idhor ? 'selected' : '' }}>
                        {{ $horario->dia->nombredia ?? 'Sin día' }} - {{ $horario->horaini }} a {{ $horario->horafin }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="detalletut">Detalle de la Tutoría</label>
            <input type="text" name="detalletut" class="form-control" value="{{ old('detalletut', $tutoria->detalletut) }}" maxlength="100" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('tutorias.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
     <a href="{{ route('admin.index') }}">Cancelar</a>
</body>
</html>