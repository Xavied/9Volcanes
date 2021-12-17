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
                <li class="breadcrumb-item active"><a href="{{ route('ordenes.show',$orden) }}">Orden N°{{ $orden->id }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pagar Orden</li>
            </ol>
        </nav>
    </div>
    
    @livewire('pagar-orden',['orden'=>$orden])
    
@endsection