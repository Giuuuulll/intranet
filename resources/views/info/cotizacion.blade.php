@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <strong>Cotización de moneda</strong>
        </div>
        <div class="card-body">
            <p class="text-muted mb-3">Valores de referencia (manuales) — actualiza según tu fuente oficial.</p>
            <div class="row g-3">
                <div class="col-12 col-md-4">
                    <div class="p-3 border rounded bg-light">
                        <div class="fw-bold">USD</div>
                        <div>Compra: 7.200</div>
                        <div>Venta: 7.350</div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="p-3 border rounded bg-light">
                        <div class="fw-bold">EUR</div>
                        <div>Compra: 7.800</div>
                        <div>Venta: 7.950</div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="p-3 border rounded bg-light">
                        <div class="fw-bold">ARS</div>
                        <div>Compra: 8,5</div>
                        <div>Venta: 9,0</div>
                    </div>
                </div>
            </div>
            <p class="mt-3 text-muted">* Sustituye estos valores por los vigentes o integra tu fuente de datos.</p>
        </div>
    </div>
</div>
@endsection
