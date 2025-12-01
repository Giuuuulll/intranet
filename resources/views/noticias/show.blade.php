@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">

    <h1 class="mt-4">{{ $noticia->titulo }}</h1>
    <p class="text-muted">Publicado el {{ $noticia->created_at->format('d/m/Y') }}</p>

    @if ($noticia->imagen)
        <img src="{{ asset('storage/noticias/' . $noticia->imagen) }}" class="img-fluid mb-3 rounded">
    @endif

    <div class="card">
        <div class="card-body">
            <p>{{ $noticia->contenido }}</p>
        </div>
    </div>

</div>
@endsection
