<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>9 Volcanes</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plantilla.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/plantilla.css') }}">

    <!-- Icono -->
    <link rel="shortcut icon" href="{{ asset('images/tiendaPNG.png') }}">
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    @yield('head')
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
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
                            <a class="btn btn-outline-success txtjmb" style=" color: #002800;"
                                href="{{ route('home') }}">{{ __('Volver página principal') }}</a>

                        <a class="btn link-secondary txtjmb ">/</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf<a class="btn btn-outline-danger" href="{{ route('logout') }}" style=" color: #002800;border: none;"
                                onclick="event.preventDefault();
                this.closest('form').submit();"> {{ __('Cerrar Sesión') }}</a>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Fin Jumbotron-->
    <div class="min-h-screen bg-gray-100">

        @include('layouts.navigation')

        <div class="container shadow">
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
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
    </div>
    <!-- jQuerys JavaScript -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/requests.js') }}"></script>
    <script src="{{ asset('js/requestEmprendimientos.js') }}"></script>
    <script src="{{ asset('js/requestsCategoria.js') }}"></script>
    <!--Fin jQuerys-->
</body>

</html>
