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
    <!--Breadcrumb página Emprendimientos-->
    <div class="breadtop">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Emprendimientos</li>
            </ol>
        </nav>

    </div>
    <!-- Fin Breadcrumb Emprendimientos-->
    <br>

    <!-- Buscador -->
    <br>
    <div class="row justify-content-end">  
        <div class="col-md-8 col-sm-12">
            <form id="searchForm" class="form-inline">
                <div class="input-group mb-3">
                    <input id="buscar_emprendimiento" name="buscar_emprendimiento" type="text" class="form-control" placeholder="Buscar emprendimientos por nombre..." aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-secondary" type="submit" id="button-addon2">Buscar</button>                            
                </div>      
            </form>
        </div>                    
    </div>         
    <!-- End Buscador -->

    <div class="container">
        <div class="row gy-3 justify-content-center">

            @foreach($emprendimientos as $emprendimiento)
            <div class="col-md-4 col-sm-12">
                <div class="card text-center shadow">

                    <div class="mt-3 text-center bg_image">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">{{$emprendimiento->nombre}}</h5>
                    </div>

                    <div class="card-footer">
                        <a href="{{route('emprend', $emprendimiento) }}">Ver más</a>
                    </div>
                </div>
            </div>
            @endforeach

            

        </div>
    </div>
    <br>
@endsection