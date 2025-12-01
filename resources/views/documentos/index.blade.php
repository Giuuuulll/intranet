@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">

    <h1 class="mt-4">Documentos</h1>

    <div class="card mb-3">
        <div class="card-body">

            <form class="row g-2" method="GET" action="{{ route('documentos') }}">
                <div class="col-md-4">
                    <input type="text" name="buscar" value="{{ $buscar }}" class="form-control" placeholder="Buscar documento...">
                </div>

                <div class="col-md-3">
                    <select name="categoria" class="form-control">
                        <option value="">Todas las categorías</option>
                        <option value="Procesos" {{ $categoria == 'Procesos' ? 'selected' : '' }}>Procesos</option>
                        <option value="Reglamentos" {{ $categoria == 'Reglamentos' ? 'selected' : '' }}>Reglamentos</option>
                        <option value="Eventos" {{ $categoria == 'Eventos' ? 'selected' : '' }}>Eventos</option>
                        <option value="General" {{ $categoria == 'General' ? 'selected' : '' }}>General</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <button class="btn btn-primary w-100">Buscar</button>
                </div>

                <div class="col-md-3">
                    <a href="{{ route('upload') }}" class="btn btn-success w-100">Subir archivo</a>
                </div>
            </form>

        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <i class="fas fa-file"></i> Lista de documentos
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Categoría</th>
                        <th>Tipo</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($documentos as $doc)
                    <tr>
                        <td>{{ $doc->titulo }}</td>
                        <td>{{ $doc->categoria }}</td>
                        <td>{{ strtoupper($doc->extension) }}</td>
                        <td>{{ $doc->created_at->format('d/m/Y') }}</td>
                        <td>

                            <a href="{{ route('documentos.descargar', $doc->id) }}" class="btn btn-sm btn-primary">
                                Descargar
                            </a>

                            <form action="{{ route('documentos.eliminar', $doc->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar documento?')">
                                    Eliminar
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

            <div>
                {{ $documentos->links() }}
            </div>

        </div>
    </div>

</div>
@endsection
