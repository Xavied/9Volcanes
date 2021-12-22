@extends('layouts.plantilla')
<!-- sección head -->
@section('head')
    <title>Crear Orden</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection
<!-- Fin sección head -->

<!-- sección menú -->
@section('navigation')

@endsection
<!-- Fin sección menú -->

@section('content')
    <br>
    <!--Breadcrumb página Home-->
    <div class="breadtop">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ordenes</li>
            </ol>
        </nav>
    </div>
    
    {{-- Ordenes --}}
    
    <div>
        <div class="text-center mt-3 mb-3">
            <a href="{{ route('ordenes.index')."?estado=2" }}" class="btn btn-info">Pagadas: {{ $pagado }}</a>
            <a href="{{ route('ordenes.index')."?estado=3" }}" class="btn btn-success">Enviadas: {{ $enviado }}</a>
            <a href="{{ route('ordenes.index')."?estado=4" }}" class="btn btn-primary">Entregadas: {{ $entregado }}</a>
            <a href="{{ route('ordenes.index')."?estado=5" }}" class="btn btn-dark">Anuladas: {{ $anulado }}</a>
        </div>
        <div class="text-center mb-3">
            <a href="{{ route('ordenes.index') }}" class="fs-4 text-uppercase text-muted text-decoration-none">Todas la ordenes</a>
        </div>
        @foreach ($ordenes as $orden)
            <div class="card">
                <div class="row">
                    <div class="col">
                        <p> Orden: {{ $orden->id }}</p>
                        <p> {{ $orden->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-8">
                                <p>Precio: {{ $orden->total }}</p>
                                <p>Estado: @switch($orden->estado) @case(2) Pagado @break @case(3) Enviado @break @case(4)
                                    Entregado @break @case(5) Anulado @break @default
                                    @endswitch
                                </p>
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('admin.ordenes.show',$orden) }}" class="btn btn-primary mt-3">
                                        Ver
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
@endsection