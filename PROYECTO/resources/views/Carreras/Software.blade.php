<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/Carreras/Software.css')}}">
    <title>Ingenieria en Software</title>
</head>
<body>
    <nav class="navbar">
  <div class="navbar-container">
    <div class="logo">
      <img src="{{asset('Imagenes/TUN.jpeg')}}" alt="TUN">
    </div>
    <ul class="nav-links">
      <li><a href="/" class="nav-link">Inicio</a></li>

      <!-- Dropdown Academia -->
      <li class="dropdown">
        <a href="/Academia" class="nav-link">Academia ▾</a>
        <ul class="dropdown-menu">
        <li><a href="/Academia" class="nav-link">Facultades</a></li>
        <li><a href="/Ingles" class="nav-link">Ingles</a></li>
        </ul>
      </li>

      <!-- Dropdown Información -->
      <li class="dropdown">
        <a href="/Informacion" class="nav-link">Información ▾</a>
        <ul class="dropdown-menu">
          <li><a href="/Informacion/mision" class="nav-link">Misión y Visión</a></li>
          <li><a href="/Informacion/noticias" class="nav-link">Noticias</a></li>
        </ul>
      </li>

      <li><a href="/Servicios" class="nav-link">Servicios</a></li>
    </ul>
  </div>
</nav>
<h1>Ingeniería en Software</h1>

  <p>La carrera de Ingeniería en Software forma profesionales capaces de analizar, diseñar, desarrollar y mantener sistemas informáticos de calidad. El egresado podrá trabajar en proyectos de desarrollo web, móvil, inteligencia artificial, ciberseguridad, bases de datos, y mucho más.</p>

  <h2>Plan de estudios por semestre</h2>

  <div class="semestre">
    <h3>1° Semestre</h3>
    <ul>
      <li>Introducción a la Programación</li>
      <li>Lógica de Sistemas</li>
      <li>Matemática Discreta</li>
      <li>Comunicación Oral y Escrita</li>
    </ul>
  </div>

  <div class="semestre">
    <h3>2° Semestre</h3>
    <ul>
      <li>Programación Orientada a Objetos</li>
      <li>Álgebra Lineal</li>
      <li>Sistemas Operativos</li>
      <li>Inglés Técnico I</li>
    </ul>
  </div>

  <div class="semestre">
    <h3>3° Semestre</h3>
    <ul>
      <li>Base de Datos I</li>
      <li>Redes de Computadoras</li>
      <li>Diseño de Interfaces</li>
      <li>Probabilidad y Estadística</li>
    </ul>
  </div>

  <div class="semestre">
    <h3>4° Semestre</h3>
    <ul>
      <li>Ingeniería de Software I</li>
      <li>Arquitectura de Computadoras</li>
      <li>Desarrollo Web</li>
      <li>Inglés Técnico II</li>
    </ul>
  </div>

  <!-- Puedes continuar con los semestres 5 al 10 -->

  <a href="/Inscripciones/formulario" class="btn-inscripcion">Inscribirse</a>
</body>
</html>