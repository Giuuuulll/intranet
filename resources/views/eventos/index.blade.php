@extends('layouts.app')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Fotos de eventos</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Galería de fotos de eventos corporativos</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-camera"></i> Galería de eventos
        </div>

        <div class="card-body">
            <div class="row g-3">

                <!-- Foto 1 -->
                <div class="col-md-3 col-sm-6">
                    <div class="card shadow-sm">
                        <img src="https://picsum.photos/400/250?random=1" class="card-img-top" alt="Evento 1">
                        <div class="card-body p-2">
                            <p class="small text-muted mb-0">Team Building – Enero 2025</p>
                        </div>
                    </div>
                </div>

                <!-- Foto 2 -->
                <div class="col-md-3 col-sm-6">
                    <div class="card shadow-sm">
                        <img src="https://picsum.photos/400/250?random=2" class="card-img-top" alt="Evento 2">
                        <div class="card-body p-2">
                            <p class="small text-muted mb-0">Capacitación Interna – RRHH</p>
                        </div>
                    </div>
                </div>

                <!-- Foto 3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="card shadow-sm">
                        <img src="https://picsum.photos/400/250?random=3" class="card-img-top" alt="Evento 3">
                        <div class="card-body p-2">
                            <p class="small text-muted mb-0">Lanzamiento de Proyecto</p>
                        </div>
                    </div>
                </div>

                <!-- Foto 4 -->
                <div class="col-md-3 col-sm-6">
                    <div class="card shadow-sm">
                        <img src="https://picsum.photos/400/250?random=4" class="card-img-top" alt="Evento 4">
                        <div class="card-body p-2">
                            <p class="small text-muted mb-0">Evento Corporativo – Marketing</p>
                        </div>
                    </div>
                </div>

                <!-- Foto 5 -->
                <div class="col-md-3 col-sm-6">
                    <div class="card shadow-sm">
                        <img src="https://picsum.photos/400/250?random=5" class="card-img-top" alt="Evento 5">
                        <div class="card-body p-2">
                            <p class="small text-muted mb-0">Convención Anual 2025</p>
                        </div>
                    </div>
                </div>

                <!-- Foto 6 -->
                <div class="col-md-3 col-sm-6">
                    <div class="card shadow-sm">
                        <img src="https://picsum.photos/400/250?random=6" class="card-img-top" alt="Evento 6">
                        <div class="card-body p-2">
                            <p class="small text-muted mb-0">Actividad con Clientes</p>
                        </div>
                    </div>
                </div>

                <!-- Foto 7 -->
                <div class="col-md-3 col-sm-6">
                    <div class="card shadow-sm">
                        <img src="https://picsum.photos/400/250?random=7" class="card-img-top" alt="Evento 7">
                        <div class="card-body p-2">
                            <p class="small text-muted mb-0">Reunión General – TI</p>
                        </div>
                    </div>
                </div>

                <!-- Foto 8 -->
                <div class="col-md-3 col-sm-6">
                    <div class="card shadow-sm">
                        <img src="https://picsum.photos/400/250?random=8" class="card-img-top" alt="Evento 8">
                        <div class="card-body p-2">
                            <p class="small text-muted mb-0">Taller de Innovación</p>
                        </div>
                    </div>
                </div>

            </div>  
        </div>
    </div>
</div>

@endsection
