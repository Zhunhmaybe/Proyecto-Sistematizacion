<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/Inscripciones/Formulario.css')}}">
    <title>Inscripciones</title>
</head>
<body>
    <h2 class="titulo-formulario">Formulario de Inscripción - {{ $carrera }}</h2>

<form action="/inscripcion/{{ strtolower($carrera) }}" method="POST">
  @csrf

  <label for="nombre">Nombre completo:</label>
  <input type="text" name="nombre" required>

  <label for="cedula">Cédula:</label>
  <input type="text" name="cedula" required>

  <label for="correo">Correo electrónico:</label>
  <input type="email" name="correo" required>

  <label for="telefono">Teléfono:</label>
  <input type="tel" name="telefono" required>

  <label for="nivel">Nivel al que desea aplicar:</label>
  <select name="nivel" required>
    <option value="1">Primer semestre</option>
    <option value="2">Segundo semestre</option>
    <option value="3">Tercero</option>
    <option value="4">Cuarto</option>
  </select>

  <button type="submit">Enviar inscripción</button>
  
</form>
</body>
</html>