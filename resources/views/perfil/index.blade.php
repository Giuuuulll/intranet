@extends('layouts.app')

@section('content')

<div class="perfil-container">

    <!-- ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬
          BANNER FULL WIDTH
    ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬ -->
    <div class="perfil-banner"></div>

    <!-- ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬
          FOTO + NOMBRE + ROL
    ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬ -->
    <div class="perfil-info">
        <img src="{{ auth()->user()->foto_perfil ?? 'https://i.pinimg.com/736x/6c/71/1f/6c711f289adfd7a9549ac4690498ad3f.jpg' }}"
             class="perfil-foto">

        <div class="perfil-textos">
            <h2 class="perfil-nombre">{{ auth()->user()->name }}</h2>
            <p class="perfil-rol">{{ ucfirst(auth()->user()->rol) }}</p>
        </div>
    </div>

    <!-- ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬
          TARJETA GRANDE DEL PERFIL
    ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬ -->
    <div class="perfil-card">

        <h3 class="titulo-seccion">Información del perfil</h3>

        <div class="perfil-datos">
            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
            <p><strong>Rol:</strong> {{ auth()->user()->rol }}</p>
            <p><strong>Miembro desde:</strong> {{ auth()->user()->created_at->format('d/m/Y') }}</p>
        </div>

        <hr class="my-4">

        <!-- ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬
              LISTA DE OPCIONES (HERMOSA)
        ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬ -->
        <h4 class="titulo-seccion">Opciones del perfil</h4>

        <ul class="perfil-opciones">
            <li>⭐ Cambiar foto de perfil</li>
            <li>⭐ Editor de datos</li>
            <li>⭐ Cambiar contraseña</li>
            <li>⭐ Mostrar actividad</li>
        </ul>

    </div>

</div>

@endsection
