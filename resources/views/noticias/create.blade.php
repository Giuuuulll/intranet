@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Crear noticia</h1>

    <div class="card">
        <div class="card-header">Nueva noticia</div>
        <div class="card-body">

            <form action="{{ route('noticias.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label>Título</label>
                <input type="text" name="titulo" class="form-control" required>

                <label class="mt-3">Contenido</label>
                <textarea name="contenido" class="form-control" rows="5" required></textarea>

                <label class="mt-3">Imagen (opcional)</label>
                <input type="file" name="imagen" class="form-control">

                <button class="btn btn-success mt-3">Guardar</button>
            </form>

        </div>
    </div>
</div>
@endsection
