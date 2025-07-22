<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Formulario Matricula</title>
    <link rel="stylesheet" href="{{asset('css/Estudiantes/matricula.css')}}">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="form-container">
                    <h1 class="form-title">
                        <i class="fas fa-graduation-cap"></i>
                        Formulario de Matrícula
                    </h1>
                    
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i>
                        Complete todos los campos para proceder con la matrícula del estudiante.
                    </div>
                    
                    <!-- FORMULARIO CORREGIDO -->
                    <form action="{{ route('estudiante.procesarMatricula') }}" method="POST" id="matriculaForm">
                        @csrf
                        
                        <div class="student-info">
                            <h5><i class="fas fa-user"></i> Información del Estudiante</h5>
                            <p><strong>ID:</strong> {{ $estudiante->idest }}</p>
                            <p><strong>Nombre:</strong> {{ $estudiante->nombreest ?? 'N/A' }}</p>
                        </div>
                        
                        <div class="form-group">
                            <input type="hidden" name="idest" value="{{ $estudiante->idest }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="idper" class="form-label">
                                <i class="fas fa-calendar-alt"></i>
                                Periodo Académico
                            </label>
                            <select name="idper" id="idper" class="form-control" required>
                                <option value="">Seleccione un periodo</option>
                                @foreach($periodos as $periodo)
                                    <option value="{{ $periodo->idper }}" {{ $periodoActivo && $periodo->idper == $periodoActivo->idper ? 'selected' : '' }}>
                                        {{ $periodo->detalleper }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="idtit" class="form-label">
                                <i class="fas fa-university"></i>
                                Carreras
                            </label>
                            <select name="idtit" id="idtit" class="form-control" required>
                                <option value="">Seleccione una Carrera</option>
                                @foreach($titulaciones as $titulacion)
                                    <option value="{{ $titulacion->idtit }}">{{ $titulacion->detalletit }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="asignaturas" class="form-label">
                                <i class="fas fa-book"></i>
                                Asignaturas
                            </label>
                            
                            <div class="alert alert-warning" id="asignaturas-warning" style="display: none;">
                                <i class="fas fa-exclamation-triangle"></i>
                                Primero debe seleccionar una carrera para ver las asignaturas disponibles.
                            </div>
                            
                            <div class="loading-spinner" id="loading-spinner">
                                <div class="spinner-border" role="status">
                                    <span class="visually-hidden">Cargando...</span>
                                </div>
                                <p class="mt-2">Cargando asignaturas...</p>
                            </div>
                            
                            <select name="asignaturas[]" id="asignaturas" class="form-control" multiple required disabled>
                                <option value="">Seleccione una Carrera primero</option>
                            </select>
                            
                            <div class="asignaturas-info" id="asignaturas-info" style="display: none;">
                                <i class="fas fa-lightbulb"></i>
                                Mantenga presionada la tecla Ctrl para seleccionar múltiples asignaturas
                            </div>
                        </div>
                        
<button type="submit" id="btn-matricular" class="matricular" disabled>
    <i class="fas fa-check-circle"></i>
    Matricular Estudiante
</button>

                    </form>
                    <a href="{{ route('estudiante.dashboard') }}" ><button class="volver">Volver</button></a>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        const idtitSelect = document.getElementById('idtit');
        const asignaturasSelect = document.getElementById('asignaturas');
        const loadingSpinner = document.getElementById('loading-spinner');
        const asignaturasWarning = document.getElementById('asignaturas-warning');
        const asignaturasInfo = document.getElementById('asignaturas-info');
        const btnMatricular = document.getElementById('btn-matricular');
        
        // Mostrar warning inicial
        asignaturasWarning.style.display = 'block';
        
        // Escuchar cambios en el select de titulación
        idtitSelect.addEventListener('change', function() {
            const idtit = this.value;
            
            if (!idtit) {
                // Si no hay titulación seleccionada
                asignaturasSelect.innerHTML = '<option value="">Seleccione una titulación primero</option>';
                asignaturasSelect.disabled = true;
                asignaturasWarning.style.display = 'block';
                asignaturasInfo.style.display = 'none';
                btnMatricular.disabled = true;
                return;
            }
            
            // Mostrar loading
            loadingSpinner.style.display = 'block';
            asignaturasWarning.style.display = 'none';
            asignaturasSelect.disabled = true;
            asignaturasSelect.innerHTML = '<option value="">Cargando...</option>';
            
            // AJAX CON MEJOR DEBUGGING
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            console.log('CSRF Token:', csrfToken);
            console.log('Enviando petición para titulación:', idtit);
            
            fetch('/estudiante/obtener-asignaturas-por-titulacion', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    idtit: idtit
                })
            })
            .then(response => {
                console.log('Response status:', response.status);
                console.log('Response headers:', response.headers);
                
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                return response.json();
            })
            .then(data => {
                console.log('Response data:', data);
                loadingSpinner.style.display = 'none';
                
                if (data.success && data.asignaturas) {
                    // Limpiar select
                    asignaturasSelect.innerHTML = '';
                    
                    if (data.asignaturas.length === 0) {
                        asignaturasSelect.innerHTML = '<option value="">No hay asignaturas disponibles para esta titulación</option>';
                        asignaturasSelect.disabled = true;
                    } else {
                        // Agregar asignaturas
data.asignaturas.forEach(asignatura => {
    const option = document.createElement('option');
    option.value = asignatura.idasi;
    option.textContent = asignatura.nombreasi; // ✅ Créditos eliminados
    asignaturasSelect.appendChild(option);
});

                        
                        asignaturasSelect.disabled = false;
                        asignaturasInfo.style.display = 'block';
                    }
                } else {
                    asignaturasSelect.innerHTML = '<option value="">Error al cargar asignaturas</option>';
                    asignaturasSelect.disabled = true;
                    console.error('Error en respuesta:', data);
                }
            })
            .catch(error => {
                console.error('Error AJAX completo:', error);
                loadingSpinner.style.display = 'none';
                asignaturasSelect.innerHTML = '<option value="">Error de conexión: ' + error.message + '</option>';
                asignaturasSelect.disabled = true;
                
                // Mostrar más información del error
                if (error.message.includes('404')) {
                    console.error('Error 404: La ruta no existe. Verifica que la ruta esté definida en web.php');
                } else if (error.message.includes('500')) {
                    console.error('Error 500: Error del servidor. Verifica el método del controlador');
                } else if (error.message.includes('419')) {
                    console.error('Error 419: Token CSRF inválido');
                }
            });
        });
        
        // Habilitar/deshabilitar botón de matricular
        function checkFormValidity() {
            const periodo = document.getElementById('idper').value;
            const titulacion = document.getElementById('idtit').value;
            const asignaturas = asignaturasSelect.selectedOptions;
            
            btnMatricular.disabled = !(periodo && titulacion && asignaturas.length > 0);
        }
        
        // Escuchar cambios en todos los campos
        document.getElementById('idper').addEventListener('change', checkFormValidity);
        idtitSelect.addEventListener('change', checkFormValidity);
        asignaturasSelect.addEventListener('change', checkFormValidity);
        
        // Validación del formulario
        document.getElementById('matriculaForm').addEventListener('submit', function(e) {
            const periodo = document.getElementById('idper').value;
            const titulacion = document.getElementById('idtit').value;
            const asignaturas = asignaturasSelect.selectedOptions;
            
            if (!periodo) {
                e.preventDefault();
                alert('Por favor, seleccione un periodo académico.');
                return;
            }
            
            if (!titulacion) {
                e.preventDefault();
                alert('Por favor, seleccione una titulación.');
                return;
            }
            
            if (asignaturas.length === 0) {
                e.preventDefault();
                alert('Por favor, seleccione al menos una asignatura.');
                return;
            }
            
        });
    </script>
</body>
</html>
