@extends('layouts.plantilla')
<!-- sección head -->
@section('head')
    <title>9Volcanes</title>
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
                <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
        </nav>

    </div>
    <!-- Fin Breadcrumb página Home-->
    <br>
    <!--Carousel de página Home-->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5"
                aria-label="Slide 6"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6"
                aria-label="Slide 7"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="7"
                aria-label="Slide 8"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="8"
                aria-label="Slide 9"></button>
        </div>
        <div class="carousel-inner carouseltmn">
            <div class="carousel-item active">
                <img src="{{ url('/storage') . '/carousel' . '/43.jpg' }}" class="d-block imgtmncrsl " alt="Primer Slide">
            </div>
            <div class="carousel-item">
                <img src="{{ url('/storage') . '/carousel' . '/1.jpg' }}" class="d-block imgtmncrsl" alt="Segundo Slide">
            </div>
            <div class="carousel-item">
                <img src="{{ url('/storage') . '/carousel' . '/3.jpg' }}" class="d-block imgtmncrsl" alt="Tercer Slide">
            </div>
            <div class="carousel-item">
                <img src="{{ url('/storage') . '/carousel' . '/4.jpg' }}" class="d-block imgtmncrsl" alt="Cuarto Slide">
            </div>
            <div class="carousel-item">
                <img src="{{ url('/storage') . '/carousel' . '/7.jpg' }}" class="d-block imgtmncrsl" alt="Quinto Slide">
            </div>
            <div class="carousel-item">
                <img src="{{ url('/storage') . '/carousel' . '/9.jpg' }}" class="d-block imgtmncrsl" alt="Cinco Slide">
            </div>
            <div class="carousel-item">
                <img src="{{ url('/storage') . '/carousel' . '/10.jpg' }}" class="d-block imgtmncrsl" alt="Sexto Slide">
            </div>
            <div class="carousel-item">
                <img src="{{ url('/storage') . '/carousel' . '/13.jpg' }}" class="d-block imgtmncrsl" alt="Septimo Slide">
            </div>
            <div class="carousel-item">
                <img src="{{ url('/storage') . '/carousel' . '/14.jpg' }}" class="d-block imgtmncrsl" alt="Octavo Slide">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!--fin del carousel-->
    <br>
    <h2 class="text-center txtprom">Productos más vendidos</h2>
    <br>
    <div class="row gy-3 justify-content-center">
        @foreach ($infoproducts as $promociones)
            <!-- Filtro titulo -->
            @foreach ($promociones as $promocion)


                <?php
                
                $tmpnom = $promocion->nombre;
                $tmpdescrp = $promocion->descripcion;
                $txtpnto = '...';
                if (strlen($tmpnom) > 14) {
                    $tmpnom = substr($tmpnom, 0, 14) . $txtpnto;
                }
                if (strlen($tmpdescrp) > 18) {
                    $tmpdescrp = substr($tmpdescrp, 0, 18) . $txtpnto;
                }
                ?>
                <div class="col-md-4 col-sm-10 ">
                    <div class="contenPrd">
                        <div>
                            <a href="{{ route('producto', $promocion) }}">
                                <img src="{{ url('/storage') . '/' . $promocion->Imagenes->first()->url }}"
                                    class="card-img-top" alt="...">
                            </a>
                        </div>

                        <div class="txtproducto">
                            <div class="row d-flex align-items-center">
                                <div class="col">
                                    <div class="ms-2">
                                        <h5 class="card-title">{{ $tmpnom }}</h5>
                                        <p class="card-text ">{{ $tmpdescrp }}</p>
                                    </div>

                                </div>
                                <div class="col d-flex justify-content-end m-2">
                                    <div>
                                        <p class="card-text text-center mb-0">${{ $promocion->precio }}</p>
                                        <a href="{{ route('producto', $promocion) }}" class="btn ">Ver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            @endforeach
        @endforeach
    </div>
    <br>
@endsection
