@extends('layouts.app')

@section('content')

<div class="layout">

    <!-- SIDEBAR IZQUIERDO -->
    <aside class="sidebar">
        <div class="sidebar-title">Menú</div>

        <a href="{{ route('documentos') }}" class="sidebar-item">Documentos</a>
        <a href="{{ route('procesos') }}" class="sidebar-item">Procesos</a>
        <a href="{{ route('reglamentos') }}" class="sidebar-item">Gestión</a>
        <a href="{{ route('eventos') }}" class="sidebar-item">Eventos</a>
        <a href="{{ route('noticias') }}" class="sidebar-item">Noticias</a>
    </aside>

    <!-- CONTENIDO CENTRAL -->
    <main class="contenido">

        <!-- SLIDER NOTICIAS -->
        @php
            $tieneNoticias = isset($ultimasNoticias) && count($ultimasNoticias) > 0;
        @endphp
        <div class="card shadow-sm mb-4 slide-card">
            <div class="card-header titulo-slide">
                <i class="fas fa-newspaper"></i> Noticias destacadas
            </div>

            <div class="card-body p-0">
                <div id="carouselNoticias" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        @if ($tieneNoticias)
                            @foreach ($ultimasNoticias as $index => $n)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img
                                    src="{{ $n->imagen ? asset('storage/noticias/'.$n->imagen) : 'https://picsum.photos/1600/900' }}"
                                    class="d-block w-100 slide-img"
                                    alt="{{ $n->titulo }}"
                                >
                                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-2 rounded" style="bottom: 10px;">
                                    <h5>{{ $n->titulo }}</h5>
                                    <p>{{ Str::limit($n->contenido, 100) }}</p>
                                </div>
                            </div>
                            @endforeach
                        @else
                            @php
                                $fallback = [
                                    ['titulo' => 'Bienvenido a la intranet', 'img' => 'https://picsum.photos/seed/intra1/1600/900'],
                                    ['titulo' => 'Comparte tus noticias', 'img' => 'https://picsum.photos/seed/intra2/1600/900'],
                                    ['titulo' => 'Comunicación interna', 'img' => 'https://picsum.photos/seed/intra3/1600/900'],
                                ];
                            @endphp
                            @foreach ($fallback as $index => $item)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ $item['img'] }}" class="d-block w-100 slide-img" alt="{{ $item['titulo'] }}">
                                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-2 rounded" style="bottom: 10px;">
                                    <h5>{{ $item['titulo'] }}</h5>
                                    <p>Agrega tus primeras noticias para mostrarlas aquí.</p>
                                </div>
                            </div>
                            @endforeach
                        @endif

                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselNoticias" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselNoticias" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
        </div>

        <!-- GALERÍA PÚBLICA (noticia1/2/3) -->
        @php
            $images = [
                asset('storage/noticias/noticia1.jpg'),
                asset('storage/noticias/noticia2.jpg'),
                asset('storage/noticias/noticia3.jpg'),
            ];
        @endphp
        <div class="card shadow-sm mb-4 public-gallery">
            <div class="card-header titulo-slide">
                <i class="fas fa-images"></i> Galería institucional
            </div>
            <div class="card-body p-0">
                <div class="gallery-frame">
                    @foreach ($images as $index => $img)
                        <img src="{{ $img }}" class="gallery-frame__img" style="--i: {{ $index }};" alt="Imagen institucional {{ $index + 1 }}">
                    @endforeach
                </div>
            </div>
        </div>

        <!-- INFORMACIÓN ÚTIL -->
        <div class="info-util">
            <h2>Información útil</h2>
            <div class="info-grid">
                <div class="info-card">Cotización de moneda</div>
                <div class="info-card">Números de teléfono</div>
                <div class="info-card">Eventos</div>
            </div>
        </div>

    </main>

    <!-- PANEL DERECHA: CUMPLEAÑOS -->
    <aside class="cumple-box">
        <h3>Cumpleaños del mes</h3>

        <div class="mini-calendario">
            @php
                use Carbon\Carbon;
                $hoy = Carbon::now();
                $primerDia = $hoy->copy()->startOfMonth();
                $ultimoDia = $hoy->copy()->endOfMonth();
                $inicioSemana = $primerDia->dayOfWeekIso;
                $totalDias = $ultimoDia->day;
                $diasConCumple = $cumpleMes
                    ->map(fn($c) => Carbon::parse($c->fecha_nacimiento)->day)
                    ->unique()
                    ->toArray();
            @endphp

            <table>
                <thead>
                    <tr>
                        <th>D</th><th>L</th><th>M</th><th>X</th><th>J</th><th>V</th><th>S</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    @php $col = 1; @endphp
                    @for ($i = 1; $i < $inicioSemana; $i++)
                        <td></td>
                        @php $col++; @endphp
                    @endfor
                    @for ($dia = 1; $dia <= $totalDias; $dia++)
                        <td class="{{ in_array($dia, $diasConCumple) ? 'cumple' : '' }}">
                            {{ $dia }}
                        </td>
                        @if ($col % 7 == 0)
                            </tr><tr>
                        @endif
                        @php $col++; @endphp
                    @endfor
                    </tr>
                </tbody>
            </table>
        </div>
    </aside>

</div>

@endsection
