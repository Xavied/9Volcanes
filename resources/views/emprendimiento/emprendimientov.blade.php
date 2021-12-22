@extends('layouts.plantilla')
<!-- sección head -->
@section('head')
    <title>Emprendimientos</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection
<!-- Fin sección head -->

<!-- sección menú -->
@section('navigation')

@endsection
<!-- Fin sección menú -->

@section('content')

<br>
    <!--Breadcrumb página Emprendimientos/Emprendimiento-->
    <div class="breadtop">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active"><a href="/emprendimientos">Emprendimientos</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$marcae->nombre}}</li>
            </ol>
        </nav>

    </div>
    <!-- Fin Breadcrumb Emprendimientos/Emprendimiento-->
    <br>

<!-- Productos -->
<br>
<div class="container">
    <br>
    <h1>{{$marcae->nombre}}</h1>
    <br>
    <div class="row gy-3 justify-content-center">
        @foreach ($productos as $producto)
            <div class="col-md-4 col-sm-12">            
                <div class="card text-center shadow" style="width: 100%;">    
                    <img src="{{url('/storage').'/'.$producto->Imagenes->first()->url}}" class="card-img-top" alt="...">   
                                                    
                    <div class="card-body">
                      <h6 class="card-title">{{ $producto->get_nombre}}</h6>
                      <p class="card-text">${{ $producto->precio }}</p>
                      <a href="{{route('producto', $producto) }}" class="btn btn-success">Ver Producto</a>
                    </div>
                </div>
            </div>
        @endforeach                    
        <div class="container">
            <br><br>
            <div class="row justify-content-end">
                <div class="col-auto">
                    {{$productos->links("pagination::bootstrap-4")}}
                </div>                
            </div>  
            <br><br>          
        </div>       
    </div>
</div>
<!-- End Productos -->
@endsection