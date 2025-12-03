<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProcesoController;
use App\Http\Controllers\ReglamentoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SearchController; // IMPORTANTE 🔥
use App\Models\Noticia;
use App\Models\Empleado;
use App\Http\Controllers\PerfilController;

/* =====================
   LOGIN (PÚBLICO)
===================== */
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

/* =====================
   LOGOUT
===================== */
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* =====================
   TODO LO DEMÁS REQUIERE LOGIN
===================== */
Route::middleware('auth')->group(function () {

    // HOME
    Route::get('/', fn() => redirect()->route('dashboard'));

    // BUSCADOR
    Route::get('/buscar', [SearchController::class, 'search'])->name('buscar');

    // PERFIL
    Route::get('/perfil', function () {
        return view('perfil.index');
    })->name('perfil');

    // DASHBOARD
    Route::get('/dashboard', function () {
        $ultimasNoticias = Noticia::latest()->take(3)->get();
        $cumpleMes = Empleado::whereMonth('fecha_nacimiento', now()->month)->get();

        return view('dashboard.index', compact('ultimasNoticias', 'cumpleMes'));
    })->name('dashboard');

    /* =====================
       DOCUMENTOS
    ===================== */
    Route::get('/documentos', [DocumentController::class, 'index'])->name('documentos');
    Route::get('/descargar/{id}', [DocumentController::class, 'descargar'])->name('documentos.descargar');

    Route::middleware(['rol:rrhh,ti,auditoria'])->group(function () {
        Route::get('/upload', [DocumentController::class, 'create'])->name('upload');
        Route::post('/upload', [DocumentController::class, 'store'])->name('upload.store');
        Route::delete('/eliminar/{id}', [DocumentController::class, 'eliminar'])->name('documentos.eliminar');
    });

    /* =====================
       NOTICIAS
    ===================== */
    Route::get('/noticias', [NoticiasController::class, 'index'])->name('noticias');
    Route::get('/noticias/{id}', [NoticiasController::class, 'show'])->name('noticias.show');

    Route::middleware(['rol:rrhh,ti,auditoria'])->group(function () {
        Route::get('/noticias/crear', [NoticiasController::class, 'create'])->name('noticias.create');
        Route::post('/noticias/crear', [NoticiasController::class, 'store'])->name('noticias.store');
    });

    /* =====================
       CUMPLEAÑOS
    ===================== */
    Route::get('/cumpleanos', [EmpleadoController::class, 'index'])->name('cumpleanos');

    Route::middleware(['rol:rrhh'])->group(function () {
        Route::get('/cumpleanos/crear', [EmpleadoController::class, 'create'])->name('cumpleanos.create');
        Route::post('/cumpleanos/crear', [EmpleadoController::class, 'store'])->name('cumpleanos.store');
    });

    /* =====================
       PROCESOS
    ===================== */
    Route::get('/procesos', [ProcesoController::class, 'index'])->name('procesos');
    Route::get('/procesos/descargar/{id}', [ProcesoController::class, 'descargar'])->name('procesos.descargar');

    Route::middleware(['rol:rrhh,ti,auditoria'])->group(function () {
        Route::get('/procesos/crear', [ProcesoController::class, 'create'])->name('procesos.create');
        Route::post('/procesos/crear', [ProcesoController::class, 'store'])->name('procesos.store');
    });

    /* =====================
       REGLAMENTOS
    ===================== */
    Route::get('/reglamentos', [ReglamentoController::class, 'index'])->name('reglamentos');
    Route::get('/reglamentos/descargar/{id}', [ReglamentoController::class, 'descargar'])->name('reglamentos.descargar');

    Route::middleware(['rol:rrhh,ti,auditoria'])->group(function () {
        Route::get('/reglamentos/crear', [ReglamentoController::class, 'create'])->name('reglamentos.create');
        Route::post('/reglamentos/crear', [ReglamentoController::class, 'store'])->name('reglamentos.store');
    });

    /* =====================
       EVENTOS
    ===================== */
    Route::view('/eventos', 'eventos.index')->name('eventos');

    Route::post('/perfil/foto', [PerfilController::class, 'cambiarFoto'])->name('perfil.foto');

    

Route::middleware('auth')->group(function () {
    Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil');

    // si más adelante editamos datos:
    Route::post('/perfil/editar', [PerfilController::class, 'update'])->name('perfil.update');
});

// PERFIL
Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil');

// Opciones futuras:
Route::post('/perfil/actualizar', [PerfilController::class, 'actualizar'])->name('perfil.actualizar');
Route::post('/perfil/foto', [PerfilController::class, 'actualizarFoto'])->name('perfil.foto');
Route::post('/perfil/password', [PerfilController::class, 'actualizarPassword'])->name('perfil.password');


});
