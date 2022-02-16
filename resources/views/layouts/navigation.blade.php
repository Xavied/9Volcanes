<nav x-data="{ open: false }" class="position-relative navbar navbar-expand-md navbar-light">
    <!-- Primary Navigation Menu -->
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto" style="color: black">
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link " style=" color: #002800;"
                            href="{{ route('dashboard') }}">{{ __('Inicio') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " style=" color: #002800;"
                            href="{{ route('categoria.index') }}">{{ __('Categoria') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " style=" color: #002800;" href="prods">{{ __('Productos') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " style=" color: #002800;"
                            href="{{ route('showEmprendimientos') }}">{{ __('Emprendimientos') }}</a>
                    </li>
                    <li class="nav-item">

                      <a class="nav-link " style=" color: #002800;"
                          href="{{ route('admin.ordenes.index') }}">{{ __('Ordenes') }}</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " style=" color: #002800;"
                          href="{{ route('admin.usuarios') }}">{{ __('Usuarios') }}</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " style=" color: #002800;"
                          href="{{ route('admin.telefono_direccion.index') }}">{{ __('Telefono y Dirección') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " style=" color: #002800;"
                            href="{{ route('footer.index') }}">{{ __('Pie de página') }}</a>                           
                    </li>
                     <li class="nav-item">
                        <a class="nav-link " style=" color: #002800;"
                             href="{{ route('sendpush') }}">{{ __('Notificación Push') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " style=" color: #002800;"
                            href="{{ route('news') }}">{{ __('Neswletter') }}</a>

                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
