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
            <div class="carousel-item active">
                <img src="https://cdn.pixabay.com/photo/2010/12/13/10/05/berries-2277_960_720.jpg"
                    class="d-block imgtmncrsl " alt="Primer Slide">
            </div>
            <div class="carousel-item">
                <img src="https://cdn.pixabay.com/photo/2017/07/31/04/11/tomato-2556426_960_720.jpg"
                    class="d-block imgtmncrsl" alt="Segundo Slide">
            </div>
            <div class="carousel-item">
                <img src="https://cdn.pixabay.com/photo/2018/03/21/23/21/nuts-3248743_960_720.jpg"
                    class="d-block imgtmncrsl" alt="Tercer Slide">
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
@endsection
