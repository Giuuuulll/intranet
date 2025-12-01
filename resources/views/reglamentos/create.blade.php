@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">

    <h1 class="mt-4">Subir reglamento</h1>

    <div class="card">
        <div class="card-header">
            <i class="fas fa-upload"></i> Nuevo reglamento
        </div>

        <div class="card-body">

            <form action="{{ route('reglamentos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label class="mt-2">Título del reglamento</label>
                <input type="text" name="titulo" class="form-control" required>

                <label class="mt-3">Archivo (PDF, Imagen, Word)</label>
                <input type="file" name="archivo" class="form-control" required>

                <button class="btn btn-success mt-4">
                    <i class="fas fa-save"></i> Guardar
                </button>

            </form>

        </div>
    </div>
</div>
@endsection
