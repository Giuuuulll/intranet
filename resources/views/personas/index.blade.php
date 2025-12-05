@extends('layouts.app')

@section('content')
<div class="layout personas-layout">
    <main class="main-content personas-main">
        <div class="people-hero card">
            <div>
                <p class="eyebrow">Directorio</p>
                <h2 class="people-title">Personas</h2>
                <p class="people-subtitle">Todos los usuarios registrados en la intranet.</p>
            </div>
            <div class="people-actions">
                <form action="{{ route('personas') }}" method="GET" class="people-search">
                    <i class="fas fa-search"></i>
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Buscar personas..." />
                </form>
                <span class="people-count badge bg-success-subtle text-success">{{ $usuarios->count() }} usuarios</span>
            </div>
        </div>

        <div class="people-grid">
            @forelse ($usuarios as $u)
                @php
                    $initial = mb_strtoupper(mb_substr($u->name, 0, 1));
                    $rol = $u->rol ?? 'usuario';
                    $colors = ['#2f9e63', '#5f8ac7', '#f08c2b', '#e4508f', '#4d53e0', '#2f9e9e'];
                    $bg = $colors[$loop->index % count($colors)];
                @endphp
                <div class="people-card">
                    <div class="people-avatar" style="background: {{ $bg }};">
                        <span>{{ $initial }}</span>
                    </div>
                    <div class="people-meta">
                        <div class="people-name">{{ $u->name }}</div>
                        <div class="people-email">{{ $u->email }}</div>
                        <div class="people-tags">
                            <span class="badge bg-light text-dark border">{{ $rol }}</span>
                            @if($u->created_at)
                                <span class="badge bg-light text-muted border">{{ $u->created_at->format('Y-m-d') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="people-empty card">
                    <div class="card-body text-center text-muted">
                        No hay usuarios registrados.
                    </div>
                </div>
            @endforelse
        </div>
    </main>
</div>
@endsection
