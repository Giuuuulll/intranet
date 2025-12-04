@extends('layouts.app')

@section('content')

<div class="perfil-card" style="width:90%; margin:20px auto;">

    <h2 class="titulo-seccion">Cambiar contraseña</h2>

    <form action="{{ route('perfil.password.actualizar') }}" method="POST">
        @csrf

        <label class="form-label">Contraseña actual:</label>
        <input type="password" name="password_actual" class="form-control" required>

        <label class="form-label mt-3">Nueva contraseña:</label>
        <input type="password" name="password" class="form-control" required>

        <label class="form-label mt-3">Repetir contraseña:</label>
        <input type="password" name="password_confirmation" class="form-control" required>

        <button class="btn btn-primary mt-4 w-100">Actualizar contraseña</button>
    </form>

</div>

@endsection
