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
        </div>
        <div class="carousel-inner carouseltmn">
            @foreach ($productos as $producto)
                <?php
                $id = $producto->id;
                if ($id == 1) {
                    $img1 = $producto->Imagenes->first()->url;
                } elseif ($id == 2) {
                    $img2 = $producto->Imagenes->first()->url;
                } elseif ($id == 3) {
                    $img3 = $producto->Imagenes->first()->url;
                    break;
                }
                ?>
            @endforeach

            <div class="carousel-item active">
                <img src="{{ url('/storage') . '/' . $img1 }}" class="d-block imgtmncrsl " alt="Primer Slide">
            </div>
            <div class="carousel-item">
                <img src="{{ url('/storage') . '/' . $img2 }}" class="d-block imgtmncrsl" alt="Segundo Slide">
            </div>
            <div class="carousel-item">
                <img src="{{ url('/storage') . '/' . $img3 }}" class="d-block imgtmncrsl" alt="Tercer Slide">
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
    <h2 class="text-center txtprom">Promociones</h2>
    <br>
    <div class="row gy-3 justify-content-center">
        @foreach ($promociones as $promocion)
            <!-- Filtro titulo -->
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
            <div class="col-md-4 ">
                <div class="contenPrd">
                    <a href="{{ route('producto', $promocion) }}">
                    <img src="{{ url('/storage') . '/' . $promocion->Imagenes->first()->url }}" class="card-img-top"
                        alt="...">
                    </a>
                    <div class="txtproducto">
                        <div class="row d-flex align-items-center">
                            <div class="col">
                                <div class="ms-2">
                                    <h5 class="card-title">{{ $promocion->nombre }}</h5>
                                    <p class="card-text ">{{ $tmpdescrp }}</p>
                                </div>                                                               

                            </div>
                            <div class="col d-flex justify-content-end m-2">
                                <div>
                                    <p class="card-text text-center mb-0">${{ $promocion->precio }}</p>
                                    <a href="{{ route('producto', $promocion) }}" class="btn " >Ver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        @endforeach
    </div>
    <br>
@endsection
