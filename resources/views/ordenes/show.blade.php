@extends('layouts.plantilla')
<!-- sección head -->
@section('head')
    <title>Pagar Orden</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <script src="sweetalert2.min.js"></script>
  <link rel="stylesheet" href="sweetalert2.min.css">
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
                <li class="breadcrumb-item active"><a href="{{ route('ordenes.index') }}">Ordenes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Orden N°{{ $orden->id }}</li>
            </ol>
        </nav>
    </div>
    
    {{-- Se muesttra la orden --}}
   <div>
       <h4 class="text-center text-uppercase">Orden N°{{ $orden->id }} (
        @switch($orden->estado) @case(1) Pendiente @break
        @case(2) Pagado @break @case(3) Enviado @break @case(4)
        Entregado @break @case(5) Anulado @break @default
        @endswitch)</h4>
        <div class="d-flex justify-content-around align-items-center mx-3">
            <div class="card  mb-3 {{ $orden->estado >= 2 && $orden->estado != 5 ? 'bg-dark text-white' : 'bg-light' }}">
                <div class="card-header">Pagado</div>
                <div class="card-body text-center">
                    <h1 class="card-title">
                        <i class="bi bi-box-seam"></i>
                    </h1>
                </div>
            </div>
            <div class="{{ $orden->estado >= 3 && $orden->estado != 5 ? 'bg-dark' : 'bg-light' }}" style="flex: 1 1 0%; height: 10px;"></div>
            <div class="card  mb-3 {{ $orden->estado >= 3 && $orden->estado != 5 ? 'bg-dark text-white' : 'bg-light' }}">
                <div class="card-header">Enviado</div>
                <div class="card-body text-center">
                    <h1 class="card-title">
                        <i class="bi bi-truck"></i>
                    </h1>
                </div>
            </div>
            <div class="{{ $orden->estado >= 4 && $orden->estado != 5 ? 'bg-dark' : 'bg-light' }}" style="flex: 1 1 0%; height: 10px;"></div>
            <div class="card  mb-3 {{ $orden->estado >= 4 && $orden->estado != 5 ? 'bg-dark text-white' : 'bg-light' }}">
                <div class="card-header">Recibido</div>
                <div class="card-body text-center">
                    <h1 class="card-title">
                        <i class="bi bi-house-door"></i>
                    </h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <h4>Datos de envío:</h4>
                @if ($orden->tipo_de_envio==1)
                <p>
                    Los productos deben ser recogidos en la tienda
                </p>
                <a class="maps-button" target="_blank" href="https://maps.google.com/?q={{ $direccion->longitud }},{{ $direccion->latitud }}">Ver ubicación
                  <i class="fa-solid fa-location-dot"></i>
                </a>
                @else
                <h6>Los productos seran enviados a las siguiente dirección:</h6>
                <h6>{{ $orden->direccion_de_envio }}</h6>
                <h6>{{ $orden->referencia }}</h6>
                @endif
            </div>
            <div class="col-sm">
                <h4>Datos de contacto:</h4>
                <h6>Destinatario: {{ $orden->contacto }}</h6>
                <h6>Teléfono de contacto: {{ $orden->telefono }}</h6>
            </div>
        </div>
        <h4 class="text-center">Resumen</h4>
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto )
                    <tr>
                        <td>
                            <img src="{{ asset('storage/'.$producto->options->image) }}" alt="" class="d-none d-sm-block" style="width: 200px; height: auto; object-fit: cover">
                            {{ $producto->name }}  
                        </td>
                        <td class="text-center">{{ $producto->price }}$</td>
                        <td class="text-center">
                            {{$producto->qty  }}
                        </td>
                        <td class="text-center">
                            {{ $producto->price * $producto->qty}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
   </div>
   @if ($orden->estado == 1)
    <div class="mb-3 text-end">
        <a href="{{ route('ordenes.pagar',$orden) }}" class="btn btn-success ">Continuar con la compra</a>
    </div>
   @endif
    
@endsection