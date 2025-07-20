<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Formulario Matricula</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .container {
            padding: 40px 20px;
        }
        
        .form-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .form-title {
            color: #333;
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
            font-size: 2.2rem;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-label {
            font-weight: 600;
            color: #555;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            background: white;
        }
        
        .form-control:disabled {
            background-color: #f8f9fa;
            border-color: #dee2e6;
            color: #6c757d;
            opacity: 0.7;
        }
        
        .btn-matricular {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 15px 40px;
            font-size: 18px;
            font-weight: 600;
            border-radius: 12px;
            color: white;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }
        
        .btn-matricular:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        }
        
        .btn-matricular:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }
        
        .alert {
            border-radius: 12px;
            border: none;
            padding: 15px 20px;
            margin-bottom: 25px;
        }
        
        .alert-info {
            background: linear-gradient(135deg, #667eea20, #764ba220);
            color: #495057;
            border-left: 4px solid #667eea;
        }
        
        .alert-warning {
            background: linear-gradient(135deg, #ffc10720, #ff851b20);
            color: #856404;
            border-left: 4px solid #ffc107;
        }
        
        .asignaturas-info {
            font-size: 14px;
            color: #6c757d;
            margin-top: 5px;
            font-style: italic;
        }
        
        .form-control[multiple] {
            min-height: 200px;
        }
        
        .form-control[multiple] option {
            padding: 12px;
            margin: 3px 0;
            border-radius: 8px;
            font-size: 14px;
        }
        
        .form-control[multiple] option:checked {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }
        
        .student-info {
            background: linear-gradient(135deg, #667eea10, #764ba210);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 30px;
            border-left: 4px solid #667eea;
        }
        
        .student-info h5 {
            color: #333;
            margin-bottom: 10px;
            font-weight: 600;
        }
        
        .student-info p {
            color: #666;
            margin: 0;
        }
        
        .loading-spinner {
            display: none;
            text-align: center;
            padding: 20px;
        }
        
        .spinner-border {
            width: 3rem;
            height: 3rem;
            border-width: 0.3em;
            border-color: #667eea;
            border-right-color: transparent;
        }
        
        @media (max-width: 768px) {
            .form-container {
                padding: 25px;
                margin: 20px 10px;
            }
            
            .form-title {
                font-size: 1.8rem;
            }
            
            .btn-matricular {
                width: 100%;
                padding: 18px;
            }
        }
    </style>
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
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-matricular" id="btn-matricular" disabled>
                                <i class="fas fa-check-circle"></i>
                                Matricular Estudiante
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('estudiante.dashboard') }}" class="btn btn-secondary">Volver</a>

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
