@extends('layouts/plantilla')

@section('content')

<!--Breadcrumb página productos-->
<br>
<div class="breadtop">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/home">Productos</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $producto->nombre }}</li>
        </ol>
    </nav>
</div>
<!-- Fin Breadcrumb página productos-->

<!-- Botón para regresar a todos los productos -->
<!--<div class="container">
    <br>
    <a href="{{route('productos') }}" class="btn btn-outline-secondary" role="button">< Volver a todos los productos</a>
</div>-->
<!-- End Botón para regresar a todos los productos -->

<div class="container">
    <br>
    <div class="row">        
        <!-- Carrusel de imágenes del producto -->
        <div class="col-md-6 col-sm-12">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                </div>
                <div class="carousel-inner">                    
                  <div class="carousel-item active">
                    <img src="{{url('/storage').'/'.$producto->Imagenes->first()->url}}" class="d-block w-100" alt="...">
                  </div>
                  @foreach ($producto->Imagenes->take(-3) as $Imagen)
                    <div class="carousel-item">
                        <img src="{{url('/storage').'/'.$Imagen->url}}" class="d-block w-100" alt="...">
                    </div>
                  @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
              <br>
        </div>  
        <!-- End Carrusel de imágenes del producto -->

        <!-- Datos producto -->
        <div class="col-md-6 col-sm-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title">{{ $producto->nombre }}</h2>
                    <hr>
                    <div class="row">
                        <div class="col-auto">
                            <small>Precio:</small>
                        </div>
                        <div class="col-auto">
                            <p class="lead card-text text-danger"><strong>${{ $producto->precio }}</strong></p>                            
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <small>Estado:</small>
                        </div>
                        @if ($producto->cantidad >0)
                            <div class="col-auto">
                                <p class="lead card-text text-success"><strong>Disponible</strong></p>                      
                            </div>
                            <div class="col-auto">
                                <small class="text-secondary">*Quedan {{$producto->cantidad}} unidades</small>                         
                            </div>
                        @else
                            <div class="col-auto">
                                <p class="lead card-text text-danger"><strong>No disponible</strong></p>                      
                            </div>
                        @endif                      
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-auto ">
                            <small>Marca:</small>
                        </div>
                        <div class="col-auto ">
                            <p class="card-text">{{ $producto->marca->nombre }}</p>                            
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <small>Categoría:</small>
                        </div>
                        <div class="col-auto">
                            <p class="card-text">{{ $producto->categoria->nombre }}</p>                            
                        </div>                        
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-auto">
                            <small>Descripción del producto:</small>
                        </div>
                        <div class="col-auto">
                            <p class="card-text">{{ $producto->descripcion }}</p>
                        </div>
                    </div>                  
                </div>
            </div>             
        </div>
        <!-- End Datos producto -->    
    </div>
    <br>
</div>
@endsection

