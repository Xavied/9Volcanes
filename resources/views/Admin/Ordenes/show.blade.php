@extends('layouts.plantilla')
<!-- sección head -->
@section('head')
    <title>Pagar Orden</title>
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
                <li class="breadcrumb-item active"><a href="{{ route('ordenes.index') }}">Ordenes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Orden N°{{ $orden->id }}</li>
            </ol>
        </nav>
    </div>
    
    {{-- Se muestra la orden --}}
   @livewire('admin.actualizar-orden-estado', ['orden' => $orden], key($orden->id)) 
   
@endsection