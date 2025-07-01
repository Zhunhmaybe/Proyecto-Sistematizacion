<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/Ingles.css')}}">
    <title>Ingles</title>
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
 <section class="niveles-ingles">
  <h2>Niveles de Inglés en TUN</h2>
  <p>Conoce nuestro programa progresivo de aprendizaje de inglés, basado en el Marco Común Europeo.</p>

  <div class="niveles-grid">
    <div class="nivel-box">
      <h3>A1 - Básico</h3>
      <p>Comprensión de frases simples, saludos y expresiones cotidianas.</p>
    </div>
    <div class="nivel-box">
      <h3>A2 - Elemental</h3>
      <p>Comunicación básica en situaciones habituales: familia, compras, trabajo.</p>
    </div>
    <div class="nivel-box">
      <h3>B1 - Intermedio</h3>
      <p>Capacidad de mantener conversaciones simples y leer textos básicos.</p>
    </div>
    <div class="nivel-box">
      <h3>B2 - Intermedio Alto</h3>
      <p>Interacción fluida en temas académicos y profesionales.</p>
    </div>
    <div class="nivel-box">
      <h3>C1 - Avanzado</h3>
      <p>Comprensión profunda y expresión precisa en contextos complejos.</p>
    </div>
    <div class="nivel-box">
      <h3>C2 - Experto</h3>
      <p>Dominio total del idioma, similar al de un hablante nativo.</p>
    </div>
  </div>

  <!-- Botón de inscripción -->
  <div class="btn-inscripcion-container">
    <a href="/Inscripciones/formulario" class="btn-inscripcion">Inscribirse al curso</a>
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