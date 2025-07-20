<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Asignar Materia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="{{ asset('/css/Pro_asi/create.css') }}">
    
</head>
<body class="bg-light">

    <div class="container">
        <h1>Nueva Asignación</h1>

        <div id="success-msg" class="alert alert-success d-none"></div>

        <!-- Formulario -->
        <form id="asignar-form">
            @csrf

            <!-- Profesor -->
            <div class="mb-3">
                <label for="idpro" class="form-label">Profesor</label>
                <select class="form-select" id="idpro" name="idpro" required>
                    <option value="">Seleccione un profesor</option>
                    @foreach($profesores as $profesor)
                        <option value="{{ $profesor->idpro }}">
                            {{ $profesor->nombrespro }} {{ $profesor->apellidopro }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Área -->
            <div class="mb-3">
                <label class="form-label">Área del Profesor</label>
                <input type="text" id="area-info" class="form-control" readonly placeholder="Área no disponible">
            </div>

            <!-- Asignatura -->
            <div class="mb-3">
                <label for="idasi" class="form-label">Asignatura</label>
                <select class="form-select" id="idasi" name="idasi" disabled required>
                    <option value="">Seleccione una asignatura</option>
                </select>
                <div id="asig-msg" class="form-text text-muted mt-1"></div>
            </div>

            <button type="submit" class="asignar" id="submit-btn" disabled>Asignar</button>
            <!-- Botones -->
            
        </form>
        <div class="d-flex justify-content-between">
                
                <a href="{{ route('pro_asi.index') }}"><button class="ver">Ver Asignaciones</button></a>
                <a href="{{ route('admin.index') }}"><button class="salir">Salir</button></a>
                
            </div>
    </div>

<script>
$(document).ready(function () {
    // Cargar asignaturas según el profesor
    $('#idpro').on('change', function () {
        const profesorId = $(this).val();
        $('#idasi').html('<option value="">Seleccione una asignatura</option>').prop('disabled', true);
        $('#area-info').val('');
        $('#submit-btn').prop('disabled', true);
        $('#asig-msg').text('');
        $('#success-msg').addClass('d-none');

        if (profesorId) {
            $.ajax({
                url: `/pro-asi/get-asignaturas-por-docente/${profesorId}`,
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    if (data.success) {
                        $('#area-info').val(data.area || 'Sin área');

                        if (data.asignaturas.length > 0) {
                            data.asignaturas.forEach(a => {
                                $('#idasi').append(
                                    `<option value="${a.idasi}">${a.nombreasi} (${a.codigo})</option>`
                                );
                            });
                            $('#idasi').prop('disabled', false);
                            $('#asig-msg').text(`${data.asignaturas.length} asignatura(s) disponibles.`);
                        } else {
                            $('#asig-msg').text('No hay asignaturas disponibles para este profesor.');
                        }
                    } else {
                        $('#area-info').val('Sin área asignada');
                        $('#asig-msg').text(data.message || 'Sin datos');
                    }
                },
                error: function () {
                    $('#area-info').val('Error al cargar');
                    $('#asig-msg').text('Error al obtener las asignaturas.');
                }
            });
        }
    });

    // Habilitar botón de enviar
    $('#idasi').on('change', function () {
        $('#submit-btn').prop('disabled', !$(this).val());
    });

    // Enviar formulario por AJAX
    $('#asignar-form').on('submit', function (e) {
        e.preventDefault();

        const idpro = $('#idpro').val();
        const idasi = $('#idasi').val();
        const token = $('input[name="_token"]').val();

        $.ajax({
            url: `{{ route('pro_asi.store') }}`,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            data: {
                idpro: idpro,
                idasi: idasi
            },
            success: function (response) {
                $('#success-msg')
                    .text('Asignación realizada exitosamente.')
                    .removeClass('d-none');

                // Resetear formulario
                $('#asignar-form')[0].reset();
                $('#idasi').html('<option value="">Seleccione una asignatura</option>').prop('disabled', true);
                $('#area-info').val('');
                $('#submit-btn').prop('disabled', true);
                $('#asig-msg').text('');
            },
            error: function (xhr) {
                alert('Error al asignar. Verifica los datos o si ya está asignado.');
            }
        });
    });
});
</script>

</body>
</html>
