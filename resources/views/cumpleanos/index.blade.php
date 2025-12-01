@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">

    <h1 class="mt-4">Cumpleaños</h1>

    <a href="{{ route('cumpleanos.create') }}" class="btn btn-primary mb-3">Agregar empleado</a>

    <div class="row g-3">

        @foreach ($empleados as $e)
        <div class="col-md-3">
            <div class="card text-center shadow-sm">

                <img src="{{ $e->foto ? asset('storage/empleados/'.$e->foto) : 'https://picsum.photos/200' }}" 
                     class="card-img-top" style="height:200px; object-fit:cover;">

                <div class="card-body">
                    <h5 class="card-title">{{ $e->nombre }}</h5>
                    <p class="text-muted">
                        {{ \Carbon\Carbon::parse($e->fecha_nacimiento)->format('d/m') }}
                    </p>
                    <small class="text-muted">{{ $e->departamento }}</small>
                </div>

            </div>
        </div>
        @endforeach

    </div>

</div>
@endsection
