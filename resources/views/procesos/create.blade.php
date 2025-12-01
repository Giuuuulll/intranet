@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Subir proceso</h1>

    <div class="card">
        <div class="card-header">Nuevo proceso</div>
        <div class="card-body">

            <form action="{{ route('procesos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label>Título</label>
                <input type="text" name="titulo" class="form-control" required>

                <label class="mt-3">Archivo</label>
                <input type="file" name="archivo" class="form-control" required>

                <button class="btn btn-success mt-3">Guardar</button>

            </form>

        </div>
    </div>
</div>
@endsection
