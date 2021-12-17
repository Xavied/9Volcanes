<!DOCTYPE html>
<html lang="es">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/plantilla.css') }}">

    <!-- Icono -->
    <link rel="shortcut icon" href="{{ asset('images/tiendaPNG.png') }}">
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    @yield('head')
</head>

<body>
    <div class="colorhead">
    </div>

    <!--Jumbotron-->
    <div>
        <div class="jumbotron">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col mt-4 ml-4 mb-4">
                        <h1 class="titulo">9Volcanes</h1>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <div class="btn-group">
                            <a href="/login" class=" btn link-secondary txtjmb">Iniciar / Registrarse</a>
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <div>
                                <a href="" class="btn link-secondary txtjmb">(0 Productos)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                        class="bi bi-cart4" viewBox="0 0 16 16">
                                        <path
                                            d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Fin Jumbotron-->
    <!--Menu-->
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link " style=" color: #002800;" href="/home">Home</a>
                    </li>
                    <li class="nav-item">

                        <a class="nav-link " style=" color: #002800;" href="/productos">Productos</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link " style=" color: #002800;" href="/emprendimientos">Emprendimientos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " style=" color: #002800;" href="/nosotros">Nosotros</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    <!--Fin Menú-->

    @yield("navigation")

    <div class="container shadow">
        @yield('content')

        <!-- Primer Footer-->
        <div class="suscribe">
            <div class="row d-flex align-items-center">
                <div class="col">
                    <div class="d-flex">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-envelope sbricon" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                            </svg>
                        </div>
                        <h4>Suscribete para enterarte de las mejores ofertas</h1>
                    </div>
                </div>
                <div class="col d-flex justify-content-end">
                    <div class="container m-1">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Ingresa tu dirección de correo "
                                aria-label="Ingresa tu correo" aria-describedby="button-addon2">
                            <button class="btn btn-secondary" type="submit">Registrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="foot">

            <div class="row">
                <div class="col-sm-4 d-flex flex-column align-items-start ">
                    <div class="linefoot">
                        <h5>Sobre la Web</h5>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Phasellus nec lorem eu risus imperdiet viverra consequat id lorem.
                        Curabitur vitae nisl in augue sodales porta. Ut vel sollicitudin dolor.</p>

                </div>
                <div class="col-sm-4 d-flex flex-column align-items-start">
                    <div class="linefoot">
                        <h5>Contactos</h5>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Phasellus nec lorem eu risus imperdiet viverra consequat id lorem.
                        Curabitur vitae nisl in augue sodales porta. Ut vel sollicitudin dolor.</p>

                </div>
                <div class="col-sm-4 d-flex flex-column align-items-start">
                    <div class="linefoot">
                        <h5>Redes Sociales</h5>
                    </div>
                    <div class="tmnfoot">
                        <a href="https://www.instagram.com/ " class="sizecont">Instagram</a><br>
                        <a href="https://www.facebook.com/ " class="sizecont">facebook</a><br>
                        <a href="https://www.twitter.com/ " class="sizecont">Twitter</a><br>
                    </div>

                </div>
            </div>
        </div>
        <!-- Fin - Primer Footer-->
    </div>

    <!-- Footer de la página-->
    <footer>
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col">
                    9 Volcanes - NanoSoft100
                </div>
                <div class="col d-flex justify-content-end">
                    <a href="" class="footer-end-link">Inicio </a>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <a href="" class="footer-end-link">Avisos Legales</a>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <a href="" class="footer-end-link">Cookies </a>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <a href="" class="footer-end-link">Contacto</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Fin Footer de la página-->

    
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <!-- jQuerys JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/requests.js') }}"></script>
    <script src="{{ asset('js/requestsCategoria.js')}}"></script>
    <!--Fin jQuerys-->
</body>


</html>
