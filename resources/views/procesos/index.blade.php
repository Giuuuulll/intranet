@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Procesos</h1>

    <a href="{{ route('procesos.create') }}" class="btn btn-primary mb-3">Subir proceso</a>

    <div class="card">
        <div class="card-header"><i class="fas fa-tools"></i> Lista de procesos</div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Tipo</th>
                        <th>Fecha</th>
                        <th>Acción</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($procesos as $p)
                    <tr>
                        <td>{{ $p->titulo }}</td>
                        <td>{{ strtoupper($p->extension) }}</td>
                        <td>{{ $p->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('procesos.descargar', $p->id) }}" class="btn btn-sm btn-primary">
                                Descargar
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            {{ $procesos->links() }}
        </div>
    </div>
</div>
@endsection
