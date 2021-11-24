@extends('layouts/plantilla')

<!-- sección head -->
@section('head')
    <title>{{ $producto->nombre }}</title>
    <link rel="stylesheet" href="{{ asset('css/carrusel.css') }}">
    <!-- Link Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
@endsection
<!-- Fin sección head -->

@section('content')

<!--Breadcrumb página productos-->
<br>
<div class="breadtop">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/productos">Productos</a></li>
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
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($producto->Imagenes as $Imagen)
                    <div class="swiper-slide">
                        <img src="{{url('/storage').'/'.$Imagen->url}}" class="d-block w-100" alt="...">
                    </div>
                  @endforeach
                </div>               
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>    
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

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
    pagination: {
      el: ".swiper-pagination",
      
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>
@endsection

