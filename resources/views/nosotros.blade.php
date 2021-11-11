@extends('layouts.plantilla')
<!-- sección head -->
@section('head')
    <title>9Volcanes</title>
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
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Nosotros</li>
            </ol>
        </nav>

    </div>
    <!-- Fin Breadcrumb página Home-->
    <br>
    <!--Pagina nosotros-->
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Nosotros</h1>
                <p class="text-center">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus, illo eaque. Cum, explicabo aspernatur, earum temporibus iste placeat dignissimos ullam commodi ipsum assumenda perferendis quisquam molestiae modi voluptates error facere.
                </p>
                <p class="text-center">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex maiores inventore tempora consequatur sed cumque dolore quod consectetur explicabo reprehenderit sit voluptate, aliquam repudiandae? Eaque quo harum voluptatum. Commodi, sint.
                </p>
            </div>
            <div class="col">
                <div class="d-flex justify-content-center align-items-center">
                    <img 
                    src="https://img.goraymi.com/2019/04/15/a006ebbc4d82345c72ce7c81be58bdd2_xl.jpg"
                    class="img-fluid" alt="...">
                </div>
            </div>
        </div>
    </div>
    <!--fin del nosotros-->
    <br>
@endsection