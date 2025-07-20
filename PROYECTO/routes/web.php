<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UsuarioController,
    RegistroController,
    AuthController,
    AreaController,
    PeriodoController,
    RolController,
    DepartamentoController,
    AdminController,
    DocenteController,
    EstudianteController,
    NivelController,
    AsignaturaController,
    TitulacionController,
    ProfesorController,
    ProAsiController,
    TutoriaController,
    HorarioController,
    DiaController,
    MatriculaController
};
use App\Http\Middleware\CheckAnyPermission;

// === PÚBLICAS ===
Route::view('/', 'Inicio')->name('Inicio');
Route::view('/Academia', 'Academia');
Route::view('/Servicios', 'Servicios');
Route::view('/MisionVision', 'MisionVision');
Route::view('/Ingles', 'Ingles');
Route::view('/register', 'register');

Route::get('/Carreras/{nombre}', fn($nombre) => view('Carreras.' . $nombre));
Route::get('/Inscripciones/{carrera}', fn($carrera) => view('Inscripciones.formulario', ['carrera' => ucfirst($carrera)]));

Route::get('/register', function () {
    return view('register');
});

//Gestion de usuasrios
Route::post('/usuario', [RegistroController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{idusu}/edit', [RegistroController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{idusu}', [RegistroController::class, 'update'])->name('usuarios.update');
Route::get('/usuarios', [RegistroController::class, 'index'])->name('usuarios.index');

Route::get('/usuarios/{idusu}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{idusu}', [UsuarioController::class, 'update'])->name('usuarios.update');

Route::view('Login', 'login')->name('Login'); // para mostrar el formulario
Route::post('/Login', [AuthController::class, 'login'])->name('login');
Route::get('/Logout', [AuthController::class, 'logout'])->name('logout');
// Ruta para mostrar el formulario de login
Route::get('login', [AuthController::class, 'loginForm'])->name('login.form');


Route::get('/estudiante/dashboard', [EstudianteController::class, 'dashboard'])->name('estudiante.dashboard');
Route::get('/estudiante/matricula', [EstudianteController::class, 'mostrarFormularioMatricula'])->name('estudiante.matricula.form');
Route::post('/estudiante/matricula', [EstudianteController::class, 'procesarMatricula'])->name('estudiante.matricula');
// Rutas para estudiante
Route::post('/estudiante/obtener-asignaturas-por-titulacion', [EstudianteController::class, 'obtenerAsignaturasPorTitulacion'])
    ->name('estudiante.obtenerAsignaturasPorTitulacion');
Route::post('/estudiante/procesar-matricula', [EstudianteController::class, 'procesarMatricula'])->name('estudiante.procesarMatricula');




Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/areas/create', [AreaController::class, 'create'])->name('areas.create');

Route::get('/areas', [AreaController::class, 'index'])->name('areas.index');
Route::resource('areas', AreaController::class);
Route::get('/areas/{idare}/edit', [AreaController::class, 'edit'])->name('areas.edit');

Route::get('/periodos', [PeriodoController::class, 'index'])->name('periodos.index');
Route::get('/periodos/create', [PeriodoController::class, 'create'])->name('periodos.create');
Route::post('/periodos', [PeriodoController::class, 'store'])->name('periodos.store');
Route::get('/periodos/{idper}/edit', [PeriodoController::class, 'edit'])->name('periodos.edit');
Route::put('/periodos/{idper}', [PeriodoController::class, 'update'])->name('periodos.update');

Route::get('/admin/roles', [RolController::class, 'index'])->name('roles.index');
Route::resource('roles', RolController::class);

Route::resource('departamentos', DepartamentoController::class);

Route::get('/niveles', [NivelController::class, 'index'])->name('niveles.index');
Route::get('/niveles/create', [NivelController::class, 'create'])->name('niveles.create');
Route::post('/niveles', [NivelController::class, 'store'])->name('niveles.store');

Route::get('/asignatura', [AsignaturaController::class, 'index'])->name('asignatura.index');
Route::get('/asignatura/create', [AsignaturaController::class, 'create'])->name('asignatura.create');
Route::post('/asignaturas', [AsignaturaController::class, 'store'])->name('asignaturas.store');
Route::get('asignaturas/{idasi}/edit', [AsignaturaController::class, 'edit'])->name('asignaturas.edit');
Route::put('asignaturas/{idasi}', [AsignaturaController::class, 'update'])->name('asignaturas.update');

Route::get('/titulacion', [TitulacionController::class, 'index'])->name('titulacion.index');
Route::get('/titulacion/create', [TitulacionController::class, 'create'])->name('titulacion.create');
Route::post('/titulaciones', [TitulacionController::class, 'store'])->name('titulaciones.store');
Route::get('/titulacion/{idtit}/edit', [TitulacionController::class, 'edit'])->name('titulaciones.edit');
Route::put('/titulacion/{idtit}', [TitulacionController::class, 'update'])->name('titulaciones.update');

Route::resource('profesores', ProfesorController::class);

Route::get('/dashboard/profesores', [ProfesorController::class, 'dashboard'])->name('profesor.dashboard');
Route::middleware(['check.any.permission:profesor'])->prefix('profesor')->group(function () {
    Route::get('/tutorias/crear', [TutoriaController::class, 'createFromProfesor'])->name('profesores.tutorias.create');
});
Route::middleware(['check.any.permission:profesor'])->prefix('profesor')->group(function () {
    Route::get('/tutorias', [TutoriaController::class, 'misTutorias'])->name('profesores.tutorias.index');
});

Route::middleware(['check.any.permission:profesor'])->prefix('profesor')->group(function () {
    Route::post('/tutorias', [TutoriaController::class, 'storeFromProfesor'])->name('profesores.tutorias.store');
});




Route::resource('pro_asi', ProAsiController::class);
Route::get('/pro_asi', [ProAsiController::class, 'index'])->name('pro_asi.index');
Route::get('/pro_asi/create', [ProAsiController::class, 'create'])->name('pro_asi.create');
Route::post('/pro_asi', [ProAsiController::class, 'store'])->name('pro_asi.store');
Route::delete('/pro_asi/{id}', [ProAsiController::class, 'destroy'])->name('pro_asi.destroy');
Route::get('pro_asi/asignaturas/{idpro}', [ProAsiController::class, 'getAsignaturasPorDocente'])->name('pro_asi.asignaturas');

Route::get('/pro-asi/get-asignaturas-por-docente/{idpro}', [ProAsiController::class, 'getAsignaturasPorDocente'])
    ->name('pro_asi.get_asignaturas');

//Rutas protegidas


Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/areas/create', [AreaController::class, 'create'])->name('areas.create');
Route::get('/admin/roles', [RolController::class, 'index'])->name('roles.index');

Route::get('/usuarios/{idusu}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{idusu}', [UsuarioController::class, 'update'])->name('usuarios.update');


//Matriculas estudiante
Route::get('/estudiante/dashboard', [EstudianteController::class, 'dashboard'])->name('estudiante.dashboard');
Route::get('/estudiante/matricula', [EstudianteController::class, 'mostrarFormularioMatricula'])->name('estudiante.matricula');
Route::post('/estudiante/matricula', [EstudianteController::class, 'procesarMatricula'])->name('estudiante.matricula');
Route::resource('matriculas', MatriculaController::class);
Route::post('matriculas', [MatriculaController::class, 'store'])->name('matricula.store');


// Rutas para Tutorías
Route::middleware(['check.any.permission:admin,profesor'])->group(function () {
    Route::resource('tutorias', TutoriaController::class);
});

// Rutas para Horarios
Route::middleware(['check.any.permission:admin'])->group(function () {
    Route::resource('horarios', HorarioController::class);
});

// Rutas para Días
Route::middleware(['check.any.permission:admin'])->group(function () {
    Route::resource('dias', DiaController::class);
});
