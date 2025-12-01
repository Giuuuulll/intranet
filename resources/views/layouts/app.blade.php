<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Intranet Garden</title>
    <link href="{{ asset('sbadmin/css/styles.css') }}" rel="stylesheet">
</head>

<body class="sb-nav-fixed">

@include('partials.navbar')
<div id="layoutSidenav">
    @include('partials.sidebar')

    <div id="layoutSidenav_content">
        <main>
            @yield('content')
        </main>

        @include('partials.footer')
    </div>
</div>

<script src="{{ asset('sbadmin/js/scripts.js') }}"></script>
<!-- DataTables -->
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="{{ asset('sbadmin/js/datatables-simple-demo.js') }}"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
