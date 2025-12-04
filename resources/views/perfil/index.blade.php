@extends('layouts.app')

@section('content')

<div class="perfil-container">

    <!-- ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬
          BANNER FULL WIDTH
    ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬ -->
    <div class="perfil-banner"></div>

    <!-- FOTO + NOMBRE + ROL -->
    <div class="perfil-info">
        <img src="{{ auth()->user()->foto_perfil 
                        ? asset('storage/' . auth()->user()->foto_perfil)
                        : 'https://i.pinimg.com/736x/6c/71/1f/6c711f289adfd7a9549ac4690498ad3f.jpg' }}"
             class="perfil-foto">

        <div class="perfil-textos">
            <h2 class="perfil-nombre">{{ auth()->user()->name }}</h2>
            <p class="perfil-rol">{{ ucfirst(auth()->user()->rol) }}</p>
        </div>
    </div>

    <!-- TARJETA GRANDE DEL PERFIL -->
    <div class="perfil-card">

        {{-- ===========================================
             INFORMACIÓN DEL PERFIL
        ============================================ --}}
        <h3 class="titulo-seccion">Información del perfil</h3>

        <div class="perfil-datos">
            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
            <p><strong>Rol:</strong> {{ auth()->user()->rol }}</p>
            <p><strong>Miembro desde:</strong> {{ auth()->user()->created_at->format('d/m/Y') }}</p>
        </div>

        <hr class="my-4">


        {{-- ===========================================
             EDITAR NOMBRE + EMAIL
        ============================================ --}}
        <h4 class="titulo-seccion">Editar datos personales</h4>

        <form action="{{ route('perfil.actualizar') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control"
                       value="{{ auth()->user()->name }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Correo electrónico</label>
                <input type="email" name="email" class="form-control"
                       value="{{ auth()->user()->email }}">
            </div>

            <button class="btn btn-primary mt-2">Guardar cambios</button>
        </form>

        <hr class="my-4">


        {{-- ===========================================
             CAMBIAR FOTO DE PERFIL
        ============================================ --}}
        <h4 class="titulo-seccion">Cambiar foto de perfil</h4>

        <form action="{{ route('perfil.foto') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input class="form-control" type="file" name="foto">

            <button class="btn btn-secondary mt-2">Subir nueva foto</button>
        </form>

        <hr class="my-4">


        {{-- ===========================================
             CAMBIAR CONTRASEÑA
        ============================================ --}}
        <h4 class="titulo-seccion">Cambiar contraseña</h4>

        <form action="{{ route('perfil.password.actualizar') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Contraseña actual</label>
                <input type="password" name="password_actual" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Nueva contraseña</label>
                <input type="password" name="password_nueva" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Confirmar nueva contraseña</label>
                <input type="password" name="password_confirmar" class="form-control">
            </div>

            <button class="btn btn-warning mt-2">Actualizar contraseña</button>
        </form>

        <hr class="my-4">

        {{-- ===========================================
             OPCIONES
        ============================================ --}}
        

        <ul class="perfil-opciones">
            
        </ul>

    </div>

</div>

@endsection
