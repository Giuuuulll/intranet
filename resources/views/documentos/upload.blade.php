@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Subir archivo</h1>

    <div class="card">
        <div class="card-header">Formulario de carga</div>
        <div class="card-body">

            <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label class="form-label">Título</label>
                <input type="text" name="titulo" class="form-control" required>

                <label class="form-label mt-3">Categoría</label>
                <select name="categoria" class="form-control" required>
                    <option value="Procesos">Procesos</option>
                    <option value="Reglamentos">Reglamentos</option>
                    <option value="Eventos">Eventos</option>
                    <option value="General">General</option>
                </select>

                <label class="form-label mt-3">Archivo</label>
                <input type="file" name="archivo" class="form-control" required>

                <button type="submit" class="btn btn-success mt-3">Subir</button>

            </form>

        </div>
    </div>
</div>
@endsection
