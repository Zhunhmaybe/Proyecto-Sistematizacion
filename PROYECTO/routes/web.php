<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;





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
Route::post('/Login', [AuthController::class, 'login'])->name('login'); // procesa el login

Route::get('/dashboard', function () {
    return view('estudiante'); // ← Aquí se muestra tu vista estudiante.blade.php
})->middleware('auth.session')->name('dashboard');

Route::get('/register', function(){
return view('register');
});