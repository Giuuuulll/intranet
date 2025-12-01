@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Noticias</h1>

    <a href="{{ route('noticias.create') }}" class="btn btn-primary mb-3">Crear noticia</a>

    <div class="card">
        <div class="card-header"><i class="fas fa-newspaper"></i> Noticias</div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($noticias as $n)
                    <tr>
                        <td>{{ $n->titulo }}</td>
                        <td>{{ $n->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('noticias.show', $n->id) }}" class="btn btn-sm btn-primary">Ver</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $noticias->links() }}
        </div>
    </div>
</div>
@endsection
