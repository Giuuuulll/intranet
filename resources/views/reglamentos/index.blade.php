@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Reglamentos internos</h1>

    <a href="{{ route('reglamentos.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus-circle"></i> Subir reglamento
    </a>

    <div class="card">
        <div class="card-header">
            <i class="fas fa-file-alt"></i> Lista de reglamentos
        </div>

        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Tipo</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($reglamentos as $r)
                    <tr>
                        <td>{{ $r->titulo }}</td>
                        <td>{{ strtoupper($r->extension) }}</td>
                        <td>{{ $r->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('reglamentos.descargar', $r->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-download"></i> Descargar
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

            <!-- Paginación -->
            {{ $reglamentos->links() }}

        </div>
    </div>
</div>
@endsection
