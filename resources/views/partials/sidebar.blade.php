<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion" style="background:#fff;">

        <div class="sb-sidenav-menu">

            <!-- BUSCADOR -->
            <div class="p-3">
                <input type="text" class="form-control" placeholder="🔍 Buscar personas">
            </div>

            <div class="nav">

                <a class="nav-link" href="{{ route('documentos') }}">
                    <div class="sb-nav-link-icon" 
                        style="width:20px;height:20px;background:#e81313;border-radius:3px;"></div>
                    <span class="ms-2">Documentos</span>
                </a>

                <a class="nav-link" href="{{ route('procesos') }}">
                    <div class="sb-nav-link-icon"
                        style="width:20px;height:20px;background:#e81313;border-radius:3px;"></div>
                    <span class="ms-2">Procesos</span>
                </a>

                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"
                        style="width:20px;height:20px;background:#e81313;border-radius:3px;"></div>
                    <span class="ms-2">Gestión</span>
                </a>

                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"
                        style="width:20px;height:20px;background:#e81313;border-radius:3px;"></div>
                    <span class="ms-2">Sistemas</span>
                </a>

                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"
                        style="width:20px;height:20px;background:#e81313;border-radius:3px;"></div>
                    <span class="ms-2">Informes</span>
                </a>

                <a class="nav-link" href="{{ route('noticias') }}">
                    <div class="sb-nav-link-icon"
                        style="width:20px;height:20px;background:#e81313;border-radius:3px;"></div>
                    <span class="ms-2">Noticias</span>
                </a>

                <a class="nav-link" href="{{ route('eventos') }}">
                    <div class="sb-nav-link-icon"
                        style="width:20px;height:20px;background:#e81313;border-radius:3px;"></div>
                    <span class="ms-2">Eventos</span>
                </a>

            </div>
        </div>
    </nav>
</div>
