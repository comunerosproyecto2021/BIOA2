<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
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
Route::get('/', [InicioController::class, 'mostrarFormulario']);
Route::post('/ipc', [InicioController::class, 'consultarIPC']);
Route::post('/vlr_hora', [InicioController::class, 'consultarValorManoObra']);
/*Route::get('/', function () {
    return view('index');
});*/

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
