<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\NivelController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Inicio');
});

Route::get('/Academia', function () {
    return view('Academia');
});

Route::get('/Servicios', function () {
    return view('Servicios');
});

Route::get('/MisionVision', function () {
    return view('MisionVision');
});
Route::get('/Ingles', function () {
    return view('Ingles');
});

Route::get('/Carreras/{nombre}', function ($nombre) {
    return view('Carreras.' . $nombre);
});


Route::get('/Inscripciones/{carrera}', function ($carrera) {
    return view('Inscripciones.formulario', ['carrera' => ucfirst($carrera)]);
});

Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/{idusu}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{idusu}', [UsuarioController::class, 'update'])->name('usuarios.update');




Route::view('Login', 'login')->name('Login'); // para mostrar el formulario
Route::post('/Login', [AuthController::class, 'login'])->name('login');
Route::get('/Logout', [AuthController::class, 'logout'])->name('logout');


// ✅ Mantén esta:
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');


Route::get('/docente/dashboard', [DocenteController::class, 'dashboard'])->name('docente.dashboard');


Route::get('/estudiante/dashboard', [EstudianteController::class, 'dashboard'])->name('estudiante.dashboard');
Route::get('/estudiante/matricula', [EstudianteController::class, 'mostrarFormularioMatricula'])->name('estudiante.matricula.form');
Route::post('/estudiante/matricula', [EstudianteController::class, 'procesarMatricula'])->name('estudiante.matricula');


Route::get('/register', function () {
    return view('register');
});

Route::get('/admin/areas/create', [AreaController::class, 'create'])->name('areas.create');
Route::get('/areas', [AreaController::class, 'index'])->name('areas.index');
Route::resource('areas', AreaController::class);

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

