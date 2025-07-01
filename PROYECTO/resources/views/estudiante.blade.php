<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Tareas</title>
    <link rel="stylesheet" href="{{ asset('/css/estudiante.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Gestor de Tareas</h1>
        </div>

        <!-- Menú desplegable -->
        <div class="menu-container">
            <div class="menu-dropdown">
                <button class="menu-button" onclick="toggleMenu()">
                    <span id="current-view">Vista de Hoy</span>
                    <span>▼</span>
                </button>
                <div class="menu-content" id="menu-content">
                    <div class="menu-item active" onclick="selectView('today')">Vista de Hoy</div>
                    <div class="menu-item" onclick="selectView('week')">Vista Semanal</div>
                    <div class="menu-item" onclick="selectView('month')">Vista Mensual</div>
                    <div class="menu-item" onclick="selectView('tasks')">Todas las Tareas</div>
                    <div class="menu-item" onclick="selectView('categories')">Por Categorías</div>
                </div>
            </div>
        </div>

        <!-- Formulario de tareas -->
        <div class="task-form">
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Tarea</label>
                    <input type="text" class="form-input" id="task-name" placeholder="Ingresa tu tarea">
                </div>
                <div class="form-group">
                    <label class="form-label">Hora</label>
                    <input type="time" class="form-input" id="task-time">
                </div>
                <div class="form-group">
                    <label class="form-label">Categoría</label>
                    <select class="form-select" id="task-category">
                        <option value="trabajo">💼 Trabajo</option>
                        <option value="personal">👤 Personal</option>
                        <option value="ejercicio">🏃 Ejercicio</option>
                        <option value="estudio">📚 Estudio</option>
                        <option value="reuniones">🤝 Reuniones</option>
                        <option value="otros">📌 Otros</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Prioridad</label>
                    <select class="form-select" id="task-priority">
                        <option value="low">🟢 Baja</option>
                        <option value="medium">🟡 Media</option>
                        <option value="high">🔴 Alta</option>
                    </select>
                </div>
                <button class="add-task-btn" onclick="addTask()">
                    <span>➕</span>
                    Agregar
                </button>
            </div>
        </div>

        <!-- Horario -->
        <div class="schedule-container">
            <div class="schedule-header">
                <h2 class="schedule-title">Horario del Día</h2>
                <div class="current-date" id="current-month"></div>
            </div>

            <div class="schedule-grid" id="schedule-grid">
                <!-- Se generará dinámicamente -->
            </div>

            <!-- Estadísticas -->
            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-number" id="total-tasks">0</div>
                    <div class="stat-label">Total Tareas</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" id="completed-tasks">0</div>
                    <div class="stat-label">Completadas</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" id="pending-tasks">0</div>
                    <div class="stat-label">Pendientes</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" id="high-priority">0</div>
                    <div class="stat-label">Alta Prioridad</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Estado de la aplicación
        let tasks = [];
        let currentView = 'today';

        // Inicializar la aplicación
        document.addEventListener('DOMContentLoaded', function() {
            generateSchedule();
            updateCurrentDate();
            updateStats();
        });

        // Menú desplegable
        function toggleMenu() {
            const menuContent = document.getElementById('menu-content');
            menuContent.classList.toggle('show');
        }

        function selectView(view) {
            currentView = view;
            const menuItems = document.querySelectorAll('.menu-item');
            menuItems.forEach(item => item.classList.remove('active'));
            
            const viewNames = {
                'today': '📅 Vista de Hoy',
                'week': '📆 Vista Semanal',
                'month': '🗓️ Vista Mensual',
                'tasks': '📝 Todas las Tareas',
                'categories': '🏷️ Por Categorías'
            };
            
            document.getElementById('current-view').textContent = viewNames[view];
            event.target.classList.add('active');
            document.getElementById('menu-content').classList.remove('show');
        }

        // Cerrar menú al hacer clic fuera
        document.addEventListener('click', function(event) {
            const menuDropdown = document.querySelector('.menu-dropdown');
            if (!menuDropdown.contains(event.target)) {
                document.getElementById('menu-content').classList.remove('show');
            }
        });

        // Generar horario
        function generateSchedule() {
            const scheduleGrid = document.getElementById('schedule-grid');
            scheduleGrid.innerHTML = '';

            for (let hour = 6; hour < 24; hour++) {
                const timeSlot = document.createElement('div');
                timeSlot.className = 'time-slot';
                timeSlot.textContent = `${hour.toString().padStart(2, '0')}:00`;
                
                const taskSlot = document.createElement('div');
                taskSlot.className = 'task-slot';
                taskSlot.id = `slot-${hour}`;
                
                scheduleGrid.appendChild(timeSlot);
                scheduleGrid.appendChild(taskSlot);
            }
            
            renderTasks();
        }

        // Agregar tarea
        function addTask() {
            const taskName = document.getElementById('task-name').value;
            const taskTime = document.getElementById('task-time').value;
            const taskCategory = document.getElementById('task-category').value;
            const taskPriority = document.getElementById('task-priority').value;

            if (!taskName || !taskTime) {
                alert('Por favor, completa todos los campos obligatorios');
                return;
            }

            const task = {
                id: Date.now(),
                name: taskName,
                time: taskTime,
                category: taskCategory,
                priority: taskPriority,
                completed: false
            };

            tasks.push(task);
            renderTasks();
            updateStats();
            clearForm();
        }

        // Renderizar tareas
        function renderTasks() {
            // Limpiar slots existentes
            const taskSlots = document.querySelectorAll('.task-slot');
            taskSlots.forEach(slot => slot.innerHTML = '');

            tasks.forEach(task => {
                const hour = parseInt(task.time.split(':')[0]);
                const slot = document.getElementById(`slot-${hour}`);
                
                if (slot) {
                    const taskElement = document.createElement('div');
                    taskElement.className = `task-item priority-${task.priority}`;
                    taskElement.innerHTML = `
                        <span class="task-category">${getCategoryIcon(task.category)} ${task.category.toUpperCase()}</span>
                        <strong>${task.name}</strong>
                        <button class="delete-btn" onclick="deleteTask(${task.id})">×</button>
                    `;
                    
                    taskElement.addEventListener('click', function() {
                        toggleTaskCompletion(task.id);
                    });
                    
                    if (task.completed) {
                        taskElement.style.opacity = '0.6';
                        taskElement.style.textDecoration = 'line-through';
                    }
                    
                    slot.appendChild(taskElement);
                }
            });
        }

        // Obtener icono de categoría
        function getCategoryIcon(category) {
            const icons = {
                'trabajo': '💼',
                'personal': '👤',
                'ejercicio': '🏃',
                'estudio': '📚',
                'reuniones': '🤝',
                'otros': '📌'
            };
            return icons[category] || '📌';
        }

        // Eliminar tarea
        function deleteTask(id) {
            tasks = tasks.filter(task => task.id !== id);
            renderTasks();
            updateStats();
        }

        // Alternar completado
        function toggleTaskCompletion(id) {
            const task = tasks.find(t => t.id === id);
            if (task) {
                task.completed = !task.completed;
                renderTasks();
                updateStats();
            }
        }

        // Limpiar formulario
        function clearForm() {
            document.getElementById('task-name').value = '';
            document.getElementById('task-time').value = '';
            document.getElementById('task-category').selectedIndex = 0;
            document.getElementById('task-priority').selectedIndex = 0;
        }

        // Actualizar fecha actual
        function updateCurrentDate() {
            const now = new Date();
            const options = { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            };
            document.getElementById('current-date').textContent = 
                now.toLocaleDateString('es-ES', options);
        }

        // Actualizar estadísticas
        function updateStats() {
            const totalTasks = tasks.length;
            const completedTasks = tasks.filter(task => task.completed).length;
            const pendingTasks = totalTasks - completedTasks;
            const highPriorityTasks = tasks.filter(task => task.priority === 'high').length;

            document.getElementById('total-tasks').textContent = totalTasks;
            document.getElementById('completed-tasks').textContent = completedTasks;
            document.getElementById('pending-tasks').textContent = pendingTasks;
            document.getElementById('high-priority').textContent = highPriorityTasks;
        }
    </script>
</body>
</html>