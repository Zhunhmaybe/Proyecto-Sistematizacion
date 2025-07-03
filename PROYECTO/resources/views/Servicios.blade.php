<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/Servicios.css')}}">
    <title>Servicios</title>
</head>
<body>
<nav class="navbar">
  <div class="navbar-container">
    <div class="logo">
      <img src="{{asset('Imagenes/TUN.jpeg')}}" alt="TUN">
    </div>
    <ul class="nav-links">
      <li><a href="/" class="nav-link">Inicio</a></li>

    <!-- Menú desplegable Academia -->
    <li class="dropdown">
      <a class="nav-link">Academia ▾</a>
      <ul class="dropdown-menu">
        <li><a href="/Academia" class="nav-link">Facultades</a></li>
        <li><a href="/Ingles" class="nav-link">Ingles</a></li>
      </ul>
    </li>

    <!-- Menú desplegable Información -->
    <li class="dropdown">
      <a class="nav-link">Información ▾</a>
      <ul class="dropdown-menu">
        <li><a href="/MisionVision" class="nav-link">Misión y Visión</a></li>
        <li><a href="/Informacion/Noticias" class="nav-link">Noticias</a></li>
      </ul>
    </li>

          <li class="dropdown">
      <a class="nav-link">Sesion ▾</a>
      <ul class="dropdown-menu">
        <li><a href="/Login" class="nav-link">Estudiante</a></li>
        <li><a href="/Login" class="nav-link">Docente</a></li>
      </ul>
    </li>

      <li><a href="/Servicios" class="nav-link">Servicios</a></li>
    </ul>
  </div>
</nav>

<section class="servicios">
  <h2>Servicios Universitarios</h2>
  <div class="servicios-grid">
    
    <div class="servicio-card">
      <h3>Office 365</h3>
      <p>Acceso gratuito a herramientas de Microsoft (Word, Excel, Teams) con tu correo institucional.</p>
    </div>

    <div class="servicio-card">
      <h3>Biblioteca Virtual</h3>
      <p>Consulta libros digitales, revistas científicas y bases de datos académicas en línea 24/7.</p>
    </div>

    <div class="servicio-card">
      <h3>Plataforma Educativa</h3>
      <p>Entorno virtual de aprendizaje donde accedes a tus clases, tareas y recursos docentes.</p>
    </div>

    <div class="servicio-card">
      <h3>Soporte Psicológico</h3>
      <p>Atención profesional para tu bienestar emocional y orientación en situaciones académicas.</p>
    </div>

    <div class="servicio-card">
      <h3>Bolsa de Empleo</h3>
      <p>Accede a ofertas laborales, pasantías y convenios empresariales para tu crecimiento profesional.</p>
    </div>

    <div class="servicio-card">
      <h3>WiFi en Campus</h3>
      <p>Conectividad gratuita en todas las instalaciones universitarias con tu cuenta institucional.</p>
    </div>

  </div>
</section>

<footer class="footer">
  <div class="footer-container">
    
    <!-- Columna 1: Descripción -->
    <div class="footer-section">
      <h3>Technical University of North</h3>
      <p>Formando lideres del futuro con conocimento, innovacion y valores</p>
    </div>

    <!-- Columna 2: Contacto -->
    <div class="footer-section">
      <h3>CONTÁCTANOS</h3>
      <div class="contact-item"><i class="fas fa-envelope"></i>oskarjurado6@gmail.com</div>
      <div class="contact-item"><i class="fas fa-phone"></i> Lopez Anahi</div>
      <div class="contact-item"><i class="fas fa-map-marker-alt"></i> Ramos David</div>
      <div class="contact-item"><i class="fas fa-map-marker-alt"></i> Rueda Carlos</div>
    </div>

    <!-- Columna 3: Accesos Directos -->
    <div class="footer-section">
      <h3>ACCESOS DIRECTOS</h3>
      <ul class="footer-links">
        <li><a href="#">Office 365</a></li>
        <li><a href="#">TUN en cifras</a></li>
        <li><a href="#">Biblioteca</a></li>
        <li><a href="#">Transparencia</a></li>
        <li><a href="#">Legislación</a></li>
      </ul>
    </div>

    <!-- Columna 4: Boletín -->
    <div class="footer-section">
      <h3>BOLETÍN INFORMATIVO</h3>
      <div class="boletin-item">
        <div class="fecha">11<br><span>Jun</span></div>
        <div class="contenido">
          <p><strong>Segundo Proceso de Admisión 2025</strong></p>
          <small><i class="far fa-clock"></i> 11:04 am &nbsp; <i class="fas fa-tags"></i> Cursos</small>
        </div>
      </div>
      <div class="boletin-item">
        <div class="fecha">10<br><span>Jun</span></div>
        <div class="contenido">
          <p><strong>II Congreso Científico Internacional CISE 2025</strong></p>
          <small><i class="far fa-clock"></i> 5:23 pm &nbsp; <i class="fas fa-tags"></i> Noticias</small>
        </div>
      </div>
      <div class="boletin-item">
        <div class="fecha">04<br><span>Jun</span></div>
        <div class="contenido">
          <p><strong>Cooperación Interinstitucional</strong></p>
          <small><i class="far fa-clock"></i> 4:21 pm &nbsp; <i class="fas fa-tags"></i> Noticias</small>
        </div>
      </div>
    </div>

  </div>
</footer>
</body>
</html>