<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProcesoController;
use App\Http\Controllers\ReglamentoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SearchController;
use App\Models\Noticia;
use App\Models\Empleado;

/* ============================
   LOGIN / LOGOUT
============================ */
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/* ============================
   TODO LO PROTEGIDO REQUIERE LOGIN
============================ */
Route::middleware('auth')->group(function () {

    Route::get('/', fn() => redirect()->route('dashboard'));

    /* =======================
       DASHBOARD / HOME
    ======================= */
    Route::get('/dashboard', function () {
        $ultimasNoticias = Noticia::latest()->take(3)->get();
        $cumpleMes = Empleado::whereMonth('fecha_nacimiento', now()->month)->get();
        return view('dashboard.index', compact('ultimasNoticias', 'cumpleMes'));
    })->name('dashboard');


    /* =======================
       BUSCADOR GLOBAL
    ======================= */
    Route::get('/buscar', [SearchController::class, 'search'])->name('buscar');


    /* =======================
       PERFIL
    ======================= */

    // Perfil principal
    Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil');

    // Editar datos (nombre, email, bio)
    Route::get('/perfil/editar', [PerfilController::class, 'editar'])->name('perfil.editar');
    Route::post('/perfil/editar', [PerfilController::class, 'actualizar'])->name('perfil.actualizar');

    // Cambiar foto
    Route::get('/perfil/foto', [PerfilController::class, 'foto'])->name('perfil.foto');
    Route::post('/perfil/foto', [PerfilController::class, 'actualizarFoto'])->name('perfil.foto.actualizar');

    // Cambiar contraseña
    Route::get('/perfil/password', [PerfilController::class, 'password'])->name('perfil.password');
    Route::post('/perfil/password', [PerfilController::class, 'actualizarPassword'])->name('perfil.password.actualizar');


    /* =======================
       DOCUMENTOS
    ======================= */
    Route::get('/documentos', [DocumentController::class, 'index'])->name('documentos');
    Route::get('/descargar/{id}', [DocumentController::class, 'descargar'])->name('documentos.descargar');

    Route::middleware(['rol:rrhh,ti,auditoria'])->group(function () {
        Route::get('/upload', [DocumentController::class, 'create'])->name('upload');
        Route::post('/upload', [DocumentController::class, 'store'])->name('upload.store');
        Route::delete('/eliminar/{id}', [DocumentController::class, 'eliminar'])->name('documentos.eliminar');
    });


    /* =======================
       NOTICIAS
    ======================= */
    Route::get('/noticias', [NoticiasController::class, 'index'])->name('noticias');
    Route::get('/noticias/{id}', [NoticiasController::class, 'show'])->name('noticias.show');

    Route::middleware(['rol:rrhh,ti,auditoria'])->group(function () {
        Route::get('/noticias/crear', [NoticiasController::class, 'create'])->name('noticias.create');
        Route::post('/noticias/crear', [NoticiasController::class, 'store'])->name('noticias.store');
    });


    /* =======================
       CUMPLEAÑOS
    ======================= */
    Route::get('/cumpleanos', [EmpleadoController::class, 'index'])->name('cumpleanos');

    Route::middleware(['rol:rrhh'])->group(function () {
        Route::get('/cumpleanos/crear', [EmpleadoController::class, 'create'])->name('cumpleanos.create');
        Route::post('/cumpleanos/crear', [EmpleadoController::class, 'store'])->name('cumpleanos.store');
    });


    /* =======================
       PROCESOS
    ======================= */
    Route::get('/procesos', [ProcesoController::class, 'index'])->name('procesos');
    Route::get('/procesos/descargar/{id}', [ProcesoController::class, 'descargar'])->name('procesos.descargar');

    Route::middleware(['rol:rrhh,ti,auditoria'])->group(function () {
        Route::get('/procesos/crear', [ProcesoController::class, 'create'])->name('procesos.create');
        Route::post('/procesos/crear', [ProcesoController::class, 'store'])->name('procesos.store');
    });


    /* =======================
       REGLAMENTOS
    ======================= */
    Route::get('/reglamentos', [ReglamentoController::class, 'index'])->name('reglamentos');
    Route::get('/reglamentos/descargar/{id}', [ReglamentoController::class, 'descargar'])->name('reglamentos.descargar');

    Route::middleware(['rol:rrhh,ti,auditoria'])->group(function () {
        Route::get('/reglamentos/crear', [ReglamentoController::class, 'create'])->name('reglamentos.create');
        Route::post('/reglamentos/crear', [ReglamentoController::class, 'store'])->name('reglamentos.store');
    });


    /* =======================
       EVENTOS
    ======================= */
    Route::view('/eventos', 'eventos.index')->name('eventos');
});
