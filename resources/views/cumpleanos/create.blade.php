@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">

    <h1 class="mt-4">Agregar empleado</h1>

    <div class="card">
        <div class="card-header">Nuevo empleado</div>
        <div class="card-body">

            <form action="{{ route('cumpleanos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label class="mt-2">Nombre</label>
                <input type="text" name="nombre" class="form-control">

                <label class="mt-3">Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="form-control">

                <label class="mt-3">Departamento</label>
                <input type="text" name="departamento" class="form-control">

                <label class="mt-3">Foto (opcional)</label>
                <input type="file" name="foto" class="form-control">

                <button class="btn btn-success mt-3">Guardar</button>

            </form>

        </div>
    </div>

</div>
@endsection
