@extends('layouts.app')

@section('content')

<div class="perfil-card" style="width:90%; margin:20px auto;">

    <h2 class="titulo-seccion">Editar perfil</h2>

    <form action="{{ route('perfil.actualizar') }}" method="POST">
        @csrf

        <label class="form-label">Nombre:</label>
        <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" required>

        <label class="form-label mt-3">Email:</label>
        <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required>

        <label class="form-label mt-3">Bio (opcional):</label>
        <textarea name="bio" class="form-control" rows="3">{{ auth()->user()->bio }}</textarea>

        <button class="btn btn-primary mt-4 w-100">Guardar cambios</button>
    </form>

</div>

@endsection
