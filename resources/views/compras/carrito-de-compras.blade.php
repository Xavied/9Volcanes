@extends('layouts.plantilla')
<!-- sección head -->
@section('head')
    <title>Mi carrito</title>
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
                <li class="breadcrumb-item active" aria-current="page">Mi carrito</li>
            </ol>
        </nav>
    </div>
    
    @livewire('carrito-de-compras')
    
@endsection
