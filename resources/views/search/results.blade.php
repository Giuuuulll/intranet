@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">

    <h2 class="mt-4">Resultados para: "{{ $q }}"</h2>

    <hr>

    <h4>Perfiles encontrados</h4>
    @foreach($usuarios as $u)
        <p>
            <strong>{{ $u->name }}</strong> — Rol: {{ $u->rol }}
            <a href="{{ route('perfil') }}">Ver perfil</a>
        </p>
    @endforeach

    <hr>

    <h4>Documentos</h4>
    @foreach($documentos as $d)
        <p>{{ $d->titulo }}</p>
    @endforeach

    <hr>

    <h4>Noticias</h4>
    @foreach($noticias as $n)
        <p>{{ $n->titulo }}</p>
    @endforeach

    <hr>

    <h4>Cumpleaños (empleados)</h4>
    @foreach($empleados as $e)
        <p>{{ $e->nombre }}</p>
    @endforeach

</div>
@endsection
