@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">
    <h2 class="mb-3">Resultados para: "{{ $q }}"</h2>

    <div class="row g-3">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">Usuarios ({{ $usuarios->count() }})</div>
                <div class="card-body">
                    @forelse($usuarios as $u)
                        <div class="mb-2">
                            <strong>{{ $u->name }}</strong> — {{ $u->email }} <br>
                            <span class="badge bg-success-subtle text-success">{{ $u->rol ?? 'usuario' }}</span>
                        </div>
                    @empty
                        <p class="text-muted mb-0">Sin resultados.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">Documentos ({{ $documentos->count() }})</div>
                <div class="card-body">
                    @forelse($documentos as $d)
                        <div class="mb-2">
                            <strong>{{ $d->titulo }}</strong> <br>
                            <small class="text-muted">{{ $d->categoria }} · {{ $d->extension }}</small>
                        </div>
                    @empty
                        <p class="text-muted mb-0">Sin resultados.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">Noticias ({{ $noticias->count() }})</div>
                <div class="card-body">
                    @forelse($noticias as $n)
                        <div class="mb-2">
                            <strong>{{ $n->titulo }}</strong>
                        </div>
                    @empty
                        <p class="text-muted mb-0">Sin resultados.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">Empleados / Cumpleaños ({{ $empleados->count() }})</div>
                <div class="card-body">
                    @forelse($empleados as $e)
                        <div class="mb-2">
                            <strong>{{ $e->nombre }}</strong> <br>
                            <small class="text-muted">{{ $e->departamento ?? '' }}</small>
                        </div>
                    @empty
                        <p class="text-muted mb-0">Sin resultados.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">Procesos ({{ $procesos->count() }})</div>
                <div class="card-body">
                    @forelse($procesos as $p)
                        <div class="mb-2">
                            <strong>{{ $p->titulo ?? $p->archivo }}</strong>
                        </div>
                    @empty
                        <p class="text-muted mb-0">Sin resultados.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">Reglamentos ({{ $reglamentos->count() }})</div>
                <div class="card-body">
                    @forelse($reglamentos as $r)
                        <div class="mb-2">
                            <strong>{{ $r->titulo ?? $r->archivo }}</strong>
                        </div>
                    @empty
                        <p class="text-muted mb-0">Sin resultados.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
