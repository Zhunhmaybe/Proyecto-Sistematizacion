<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RegistroController;
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

Route::post('/usuarios', [RegistroController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios', [RegistroController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/{idusu}/edit', [RegistroController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{idusu}', [RegistroController::class, 'update'])->name('usuarios.update');




Route::view('Login', 'login')->name('Login'); // para mostrar el formulario
Route::post('/Login', [AuthController::class, 'login'])->name('login');
Route::get('/Logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/register', function(){
return view('register');
});
