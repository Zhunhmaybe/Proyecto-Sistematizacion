<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel del Profesor</title>

    <!-- FullCalendar CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.8/main.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }

        #calendar {
            max-width: 1000px;
            margin: 30px auto;
            background-color: #fff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }

        .section {
            max-width: 1000px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        h1, h2 {
            color: #333;
        }

        h1 {
            text-align: center;
        }

        ul {
            list-style: disc;
            padding-left: 20px;
        }

        a {
            display: inline-block;
            margin: 10px 10px 0 0;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s ease;
        }

        a:hover {
            background-color: #45a049;
        }

        .fc-daygrid-day-frame {
            min-height: 100px;
        }

        .fc .fc-daygrid-day {
            border: 1px solid #ddd;
        }

        .fc .fc-scrollgrid {
            border: none;
        }

        .fc-event {
            font-size: 0.9em;
            padding: 2px 4px;
            border-radius: 4px;
        }

        .fc-toolbar-title {
            font-size: 1.5em;
        }

        .calendar-title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }
    </style>
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

        <a href="{{ route('profesores.tutorias.index') }}">Ver mis Tutorías</a>
        <a href="{{ route('profesores.tutorias.create') }}">Crear Tutoría</a>
        <a href="{{ route('logout') }}">Cerrar Sesión</a>
    </div>

    <!-- Calendario -->
    <div class="calendar-container">
        <h2 class="calendar-title">📅 Calendario de Tutorías</h2>
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
