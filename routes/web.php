<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MantenimientosController;

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
Route::get('/', [InicioController::class, 'mostrarFormularioContrato']);

Route::post('/formulario_mantenimientos', [InicioController::class, 'mostrarFormulario']);
Route::post('/ipc', [InicioController::class, 'consultarIPC']);
Route::post('/vlr_hora', [InicioController::class, 'consultarValorManoObra']);
Route::post('/guardar_datos', [InicioController::class, 'guardarDatos']);

Route::get('/formulario_registro', [RegistroController::class, 'mostrarFormulario']);
Route::post('/registro', [RegistroController::class, 'registrar']);

Route::get('/cerrar_sesion', [LoginController::class, 'logout']);

Route::get('/mantenimientos', [MantenimientosController::class, 'listarMantenimientos']);
Route::post('/mantenimientos_filtro', [MantenimientosController::class, 'listarMantenimientosFiltro']);


Route::get('/reporte_pdf', [MantenimientosController::class, 'reportePdf']);
Route::get('/generar_reporte', [MantenimientosController::class, 'generarReporte']);
Route::get('/descargar_pdf', [MantenimientosController::class, 'descargarPDF']);

//Route::get('/ver', [MantenimientosController::class, 'verPDF']);

Auth::routes();


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
