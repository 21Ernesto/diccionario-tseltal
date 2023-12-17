<?php

use App\Http\Controllers\AbecedarioController;
use App\Http\Controllers\AntecedenteController;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\BiologosController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DicController;
use App\Http\Controllers\DonativoController;
use App\Http\Controllers\ExnumsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\ReferenciaController;
use App\Http\Controllers\SentidoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('', [HomeController::class, 'index'])->name('index');
Route::get('abecede/{id}', [HomeController::class, 'abecedario'])->name('abecedarioSelecionada');
Route::post('/tseltal', [HomeController::class, 'tseltal_fetch'])->name('tseltal_fetch');
Route::post('/spaniol', [HomeController::class, 'espanol_fetch'])->name('espanol_fetch');
Route::get('aplicacion/{lxid}', [HomeController::class, 'ver'])->name('aplicacion');


Route::get('/donativos', [DonativoController::class, 'index'])->name('donativos');
Route::get('/antecedentes', [AntecedenteController::class, 'index'])->name('antecedentes');
Route::get('/colaboradores', [ColaboradorController::class, 'index'])->name('colaboradores');
Route::get('/referencias', [ReferenciaController::class, 'index'])->name('referencias');


Auth::routes();

Route::get('/home', [DashboardController::class, 'index'])->name('home');
// ANTENCEDENTES
Route::get('/inicio', [HomeController::class, 'inicio'])->name('admin.inicio');
Route::post('/guardar-contenido-inicio', [HomeController::class, 'store'])->name('guardarContenidoInicio');

// ABECEDARIO
Route::get('/abecedario', [AbecedarioController::class, 'index'])->name('abecedario');
Route::post('/abecedario/import', [AbecedarioController::class, 'import'])->name('abecedario.import');

// DICCIONARIO
Route::get('/dicc', [DicController::class, 'index'])->name('dicc');
Route::post('/dicc/import', [DicController::class, 'import'])->name('dicc.import');

// SENTIDO
Route::get('/sentido', [SentidoController::class, 'index'])->name('sentido');
Route::post('/sentido/import', [SentidoController::class, 'import'])->name('sentido.import');

// REFERENCIA
Route::get('/referencia', [ReferenciaController::class, 'referencia'])->name('referencia');
Route::post('/referencia/import', [ReferenciaController::class, 'import'])->name('referencia.import');

// EXNUMS
Route::get('/exnums', [ExnumsController::class, 'index'])->name('exnums');
Route::post('/exnums/import', [ExnumsController::class, 'import'])->name('exnums.import');

// IMAGENE
Route::get('/imagen', [ImagenController::class, 'index'])->name('imagen');
Route::post('/imagen/import', [ImagenController::class, 'import'])->name('imagen.import');

// AUDIO
Route::get('/audio', [AudioController::class, 'index'])->name('audio');
Route::post('/audio/import', [AudioController::class, 'import'])->name('audio.import');

// COLABORADORES
Route::get('/colaborador', [ColaboradorController::class, 'colaboradores'])->name('admin.colaboradores');
Route::post('/colaboradores/import', [ColaboradorController::class, 'import'])->name('colaboradores.import');

// DONATIVOS
Route::get('/donativo', [DonativoController::class, 'donativos'])->name('admin.donativos');
Route::post('/donativos/import', [DonativoController::class, 'import'])->name('donativos.import');

// BIOLOGOS
Route::get('/biologos', [BiologosController::class, 'index'])->name('admin.biologos');
Route::post('/biologos/import', [BiologosController::class, 'import'])->name('biologos.import');





// ANTENCEDENTES
Route::get('/antecedente', [AntecedenteController::class, 'antecedentes'])->name('admin.antecedentes');
Route::post('/guardar-contenido', [AntecedenteController::class, 'store'])->name('guardarContenido');
