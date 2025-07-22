<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel del Profesor</title>
    <link rel="stylesheet" href="{{asset('css/profesor.css')}}">
</head>
<body>

    <!-- Panel de bienvenida -->
    <div class="section">
        <h1>Bienvenido, {{ $usuario->nombredusu }}</h1>

        <h2>Área asignada:</h2>
        <p>{{ $profesor->area->nombreare ?? 'No asignada' }}</p>

        <h2>Asignaturas que imparte:</h2>
        @if ($profesor->proasi->isEmpty())
            <p>No tiene asignaturas asignadas.</p>
        @else
            <ul>
                @foreach ($profesor->proasi as $asignacion)
                    <li>{{ $asignacion->asignatura->nombreasi ?? 'Asignatura no encontrada' }}</li>
                @endforeach
            </ul>
        @endif
<a href="{{ route('profesores.tutorias.index', ['idpro' => $profesor->idpro]) }}">
    <button class="crear">Ver Tutorias</button></a>
</a>
        <a href="{{ route('profesores.tutorias.create') }}"><button class="crear">Crear Tutoría</button></a>
        <a href="{{ route('logout') }}"><button class="cerrar">Cerrar Sesión</button></a>
    </div>

    <!-- Calendario -->
    <div class="calendar-container">
        <h2 class="calendar-title">Calendario de Tutorías</h2>
        <div id="calendar"></div>
    </div>

    <!-- Scripts de FullCalendar -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.8/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: @json($eventos),
                eventClick: function(info) {
                    alert('Tutoría: ' + info.event.title + '\nInicio: ' + info.event.start.toLocaleString());
                },
                dateClick: function(info) {
                    console.log('Fecha clickeada: ' + info.dateStr);
                },
                dayMaxEvents: true,
                eventDisplay: 'block',
                buttonText: {
                    today: 'Hoy',
                    month: 'Mes',
                    week: 'Semana',
                    day: 'Día'
                },
                allDayText: 'Todo el día',
                noEventsText: 'No hay tutorías programadas'
            });

            calendar.render();
        });
    </script>

</body>
</html>
