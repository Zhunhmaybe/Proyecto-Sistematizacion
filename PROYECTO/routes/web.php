<?php

use Illuminate\Support\Facades\Route;

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
    return view('Inscripciones.formulario' , ['carrera'=>ucfirst($carrera)]);
});
