@extends('layouts.app')

@section('content')

<div class="perfil-card" style="width:90%; margin:20px auto; text-align:center;">

    <h2 class="titulo-seccion">Cambiar foto de perfil</h2>

    <img id="preview" 
         src="{{ auth()->user()->foto_perfil ? asset('storage/perfiles/' . auth()->user()->foto_perfil) : 'https://i.pinimg.com/736x/6c/71/1f/6c711f289adfd7a9549ac4690498ad3f.jpg' }}"
         class="perfil-foto mb-4" style="width:160px; height:160px; border-radius:50%;">

    <form action="{{ route('perfil.foto.actualizar') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="file" name="foto_perfil" class="form-control" accept="image/*" required onchange="previewImage(event)">

        <button class="btn btn-primary mt-3 w-100">Actualizar foto</button>
    </form>

</div>

<script>
function previewImage(event) {
    const img = document.getElementById('preview');
    img.src = URL.createObjectURL(event.target.files[0]);
}
</script>

@endsection
