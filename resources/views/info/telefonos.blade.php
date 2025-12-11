@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <strong>Números de teléfono</strong>
        </div>
        <div class="card-body">
            <p class="text-muted mb-3">Contactos internos de referencia.</p>
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Área</th>
                            <th>Contacto</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Recursos Humanos</td>
                            <td>María González</td>
                            <td>+595 971 111 222</td>
                            <td>rrhh@intranet.com</td>
                        </tr>
                        <tr>
                            <td>TI / Soporte</td>
                            <td>Carlos Pérez</td>
                            <td>+595 971 333 444</td>
                            <td>soporte@intranet.com</td>
                        </tr>
                        <tr>
                            <td>Finanzas</td>
                            <td>Lucía Rojas</td>
                            <td>+595 971 555 666</td>
                            <td>finanzas@intranet.com</td>
                        </tr>
                        <tr>
                            <td>Seguridad</td>
                            <td>Guardia Central</td>
                            <td>+595 971 777 888</td>
                            <td>seguridad@intranet.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p class="mt-2 text-muted">* Ajusta los datos a los números oficiales de tu organización.</p>
        </div>
    </div>
</div>
@endsection
