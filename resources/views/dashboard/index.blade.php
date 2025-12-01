@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">

    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Bienvenida a la Intranet de Garden 🌱</li>
    </ol>

    <!-- CARDS SUPERIORES -->
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Documentos subidos este mes</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('documentos') }}">Ver detalles</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Noticias publicadas</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('noticias') }}">Ver noticias</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Procesos actualizados</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('procesos') }}">Ver procesos</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Eventos</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('eventos') }}">Ver eventos</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- SLIDE AUTOMÁTICO RECTANGULAR HERMOSO -->
    <div class="card mb-4" style="border-radius: 12px;">
        <div class="card-header">
            <i class="fas fa-newspaper"></i> Noticias destacadas
        </div>

        <div class="card-body">

            <div id="carouselNoticias" class="carousel slide" data-bs-ride="carousel">
                
                <div class="carousel-inner">

                    @foreach ($ultimasNoticias as $index => $n)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">

                        <!-- IMAGEN RECTANGULAR ESTILO BOCETO -->
                        <img
                            src="{{ $n->imagen ? asset('storage/noticias/'.$n->imagen) : 'https://picsum.photos/1200/500' }}"
                            class="d-block w-100"
                            style="
                                height: 300px;
                                object-fit: cover;
                                border-radius: 10px;
                            "
                        >

                    </div>
                    @endforeach

                </div>

                <!-- PUNTITOS ABAJO -->
                <div class="carousel-indicators mt-3">
                    @foreach ($ultimasNoticias as $index => $n)
                        <button type="button"
                                data-bs-target="#carouselNoticias"
                                data-bs-slide-to="{{ $index }}"
                                class="{{ $index == 0 ? 'active' : '' }}"
                                style="
                                    width: 10px;
                                    height: 10px;
                                    border-radius: 50%;
                                    background-color: #0d6efd;
                                ">
                        </button>
                    @endforeach
                </div>

                <!-- CONTROLES -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselNoticias" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carouselNoticias" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>

            </div>

        </div>
    </div>


    <!-- INFORMACIÓN ÚTIL -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-info-circle"></i> Información útil
        </div>

        <div class="card-body">
            <div class="row text-center">

                <div class="col-md-4 mb-3">
                    <strong>Cotización de moneda</strong><br>
                    <span class="text-muted">USD, EUR (ejemplo)</span>
                </div>

                <div class="col-md-4 mb-3">
                    <strong>Números de teléfonos</strong><br>
                    <span class="text-muted">Central · RRHH · TI · Taller</span>
                </div>

                <div class="col-md-4 mb-3">
                    <strong>Cumpleaños / Aniversarios</strong><br>
                    <span class="text-muted">Más detalles en el módulo</span>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
