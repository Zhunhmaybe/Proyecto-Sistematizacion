<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/Inicio.css')}}">
    <title>Technical University of North (TUN)</title>
</head>
<body>
    <header>
        <h1>Technical University of North</h1>
    </header>

<nav class="navbar">
  <ul class="nav-center">
    <li><a href="/" class="nav-link">Inicio</a></li>
    <li><a href="/Academia" class="nav-link">Academia</a></li>
    <li><a href="/Servicios" class="nav-link">Servicios</a></li>
    <li><a href="/Informacion" class="nav-link">Información</a></li>
  </ul>
</nav>
<div class="carousel-container">
  <div class="arrow" onclick="cambiarCurso(-1)">&#10094;</div>

  <div class="curso" id="cursoActual">
    <!-- Contenido del curso va aquí -->
  </div>

  <div class="arrow" onclick="cambiarCurso(1)">&#10095;</div>
</div>

<section class="anuncio">
  <h2>¡Inscripciones Abiertas!</h2>
  <p>Estudia en la Universidad TUN. Postúlate hasta el <strong>15 de agosto de 2025</strong>.</p>
  <a href="/inscripciones">Inscribirse ahora</a>
</section>

<!-- Modalidades -->
<section class="modalidades">
  <h2>Modalidades de Estudio</h2>
  <div class="modalidades-grid">
    <div class="modalidad">
      <h3>Presencial</h3>
      <p>Clases en campus con acceso a laboratorios, bibliotecas y actividades académicas directas.</p>
    </div>
    <div class="modalidad">
      <h3>Virtual</h3>
      <p>Estudia desde cualquier lugar con clases en línea, recursos digitales y soporte virtual.</p>
    </div>
    <div class="modalidad">
      <h3>Híbrida</h3>
      <p>Combina lo mejor del mundo presencial y virtual para mayor flexibilidad y eficiencia.</p>
    </div>
  </div>
</section>

<!-- Noticias -->
<section class="noticias">
  <h2>Últimas Noticias</h2>
  <div class="noticias-grid">
    <article class="noticia">
      <h4>Nuevo edificio de laboratorios inaugurado</h4>
      <p>La Universidad TUN inauguró su nuevo bloque tecnológico con laboratorios de última generación.</p>
      <span>Publicado: 25 de junio de 2025</span>
    </article>
    <article class="noticia">
      <h4>Convenio con universidades internacionales</h4>
      <p>Se firmaron acuerdos con instituciones de Canadá, Alemania y Japón para intercambios estudiantiles.</p>
      <span>Publicado: 18 de junio de 2025</span>
    </article>
    <article class="noticia">
      <h4>Inscripciones abiertas para el segundo semestre</h4>
      <p>Desde el 1 de julio se habilita el sistema de matrícula para el ciclo septiembre 2025.</p>
      <span>Publicado: 10 de junio de 2025</span>
    </article>
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

<script>
  const cursos = [
    {
      titulo: "Ingeniería en Sistemas",
      descripcion: "Aprende desarrollo de software, redes y más.",
      imagen: "/Imagenes/Software.jpg"
    },
    {
      titulo: "Administración de Empresas",
      descripcion: "Domina la gestión moderna empresarial.",
      imagen: "/Imagenes/Empresas.jpg"
    },
    {
      titulo: "Diseño Gráfico",
      descripcion: "Creatividad digital con herramientas profesionales.",
      imagen: "/Imagenes/Disenio.jpg"
    },
    {
      titulo: "Enfermería",
      descripcion: "Cuidar con ciencia y vocación.",
      imagen: "/Imagenes/Enfermeria.png"
    }
  ];

  let indice = 0;

  function mostrarCurso(i) {
    const curso = cursos[i];
    document.getElementById('cursoActual').innerHTML = `
      <img src="${curso.imagen}" alt="${curso.titulo}">
      <h3>${curso.titulo}</h3>
      <p>${curso.descripcion}</p>
    `;
  }

  function cambiarCurso(direccion) {
    indice += direccion;
    if (indice < 0) indice = cursos.length - 1;
    if (indice >= cursos.length) indice = 0;
    mostrarCurso(indice);
  }

  mostrarCurso(indice);
</script>
</body>
</html>