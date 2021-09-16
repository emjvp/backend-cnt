<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\TestController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ConsultaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('test', [TestController::class, 'index']);
Route::get('pacientes', [PacienteController::class, 'index']);

//Optimizar Consulta de pacientes

Route::get('optimizaratencion', [PacienteController::class, 'consultarPacientesDeformaOptima']);

Route::get('paciente/{historiaClinica}', [PacienteController::class, 'listarPacientesMayorRiesgo']);

Route::post('registrarpaciente', [PacienteController::class, 'registrarPaciente']);

Route::get('pacientemasanciano', [PacienteController::class, 'pacienteMasAnciano']);

Route::get('maspacientesatendidos', [PacienteController::class, 'consultarMasPacientesAtendidos']);

Route::get('listarconsultas', [ConsultaController::class, 'index']);

Route::put('liberarconsultas', [ConsultaController::class, 'liberarConsultas']);

Route::get('listarfumadoresporprioridad', [PacienteController::class, 'listarPacientesFumadoresUrg'] );

Route::get('pacientesenconsulta', [PacienteController::class, 'obtenerPacientesEnConsulta']);
Route::get('pacientesensalaespera', [PacienteController::class, 'obtenerPacientesEnSalaDeEspera']);

Route::get('atenderpaciente/{idPaciente}', [ConsultaController::class, 'atenderPaciente']);
Route::put('asignarconsulta/{idPaciente}', [ConsultaController::class, 'asignacionDeConsulta']);
// Route::put('registrarpaciente', [PacienteController::class, 'registrarPaciente']);

// Route::resource()
