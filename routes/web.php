<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProcesoController;
use App\Http\Controllers\ReglamentoController;
use App\Models\Noticia;
use App\Models\Empleado;


// =====================
// HOME → DASHBOARD
// =====================
Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {

    $ultimasNoticias = Noticia::latest()->take(3)->get();
    $cumpleMes = Empleado::whereMonth('fecha_nacimiento', now()->month)->get();

    return view('dashboard.index', compact('ultimasNoticias', 'cumpleMes'));

})->name('dashboard');


// =====================
// DOCUMENTOS
// =====================
Route::get('/documentos', [DocumentController::class, 'index'])->name('documentos');
Route::get('/upload', [DocumentController::class, 'create'])->name('upload');
Route::post('/upload', [DocumentController::class, 'store'])->name('upload.store');
Route::get('/descargar/{id}', [DocumentController::class, 'descargar'])->name('documentos.descargar');
Route::delete('/eliminar/{id}', [DocumentController::class, 'eliminar'])->name('documentos.eliminar');


// =====================
// NOTICIAS
// =====================
Route::get('/noticias', [NoticiasController::class, 'index'])->name('noticias');
Route::get('/noticias/crear', [NoticiasController::class, 'create'])->name('noticias.create');
Route::post('/noticias/crear', [NoticiasController::class, 'store'])->name('noticias.store');
Route::get('/noticias/{id}', [NoticiasController::class, 'show'])->name('noticias.show');


// =====================
// CUMPLEAÑOS
// =====================
Route::get('/cumpleanos', [EmpleadoController::class, 'index'])->name('cumpleanos');
Route::get('/cumpleanos/crear', [EmpleadoController::class, 'create'])->name('cumpleanos.create');
Route::post('/cumpleanos/crear', [EmpleadoController::class, 'store'])->name('cumpleanos.store');


// =====================
// PROCESOS
// =====================
Route::get('/procesos', [ProcesoController::class, 'index'])->name('procesos');
Route::get('/procesos/crear', [ProcesoController::class, 'create'])->name('procesos.create');
Route::post('/procesos/crear', [ProcesoController::class, 'store'])->name('procesos.store');
Route::get('/procesos/descargar/{id}', [ProcesoController::class, 'descargar'])->name('procesos.descargar');


// =====================
// REGLAMENTOS
// =====================
Route::get('/reglamentos', [ReglamentoController::class, 'index'])->name('reglamentos');
Route::get('/reglamentos/crear', [ReglamentoController::class, 'create'])->name('reglamentos.create');
Route::post('/reglamentos/crear', [ReglamentoController::class, 'store'])->name('reglamentos.store');
Route::get('/reglamentos/descargar/{id}', [ReglamentoController::class, 'descargar'])->name('reglamentos.descargar');


// =====================
// EVENTOS (vista simple por ahora)
// =====================
Route::view('/eventos', 'eventos.index')->name('eventos');
    