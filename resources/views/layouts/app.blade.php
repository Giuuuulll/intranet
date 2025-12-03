<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Intranet Garden</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ICONOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- PLANTILLA SB ADMIN -->
    <link rel="stylesheet" href="{{ asset('sbadmin/css/styles.css') }}">

    <!-- TU CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    @yield('styles')
</head>

<body>

    <!-- ⭐ BARRA SUPERIOR (HEADER) ⭐ -->
    <header class="topbar">
        <div class="topbar-left">
            <h1 class="logo-text">Intranet Garden 🌱</h1>
        </div>

        <div class="topbar-center">
            <input type="text" class="search-box" placeholder="Buscar…">
        </div>

        <div class="topbar-right">

            <a href="#" class="topbar-link">
                <i class="fas fa-users"></i> Personas
            </a>

            <a href="#" class="topbar-link">
                <i class="fas fa-folder-open"></i> Archivos
            </a>

            <!-- 🔥 DROPDOWN DEL USUARIO (AQUÍ SÍ O SÍ) -->
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">
                    {{ auth()->user()->name }} ({{ auth()->user()->rol }})
                </button>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('perfil') }}">Mi perfil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item">Cerrar sesión</button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>
    </header>

    <!-- ⭐ CONTENIDO PRINCIPAL ⭐ -->
    @yield('content')

    <!-- JS BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')

</body>
</html>
