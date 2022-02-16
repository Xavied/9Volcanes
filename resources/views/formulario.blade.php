@extends('layouts/plantilla')

<!-- sección head -->
@section('head')
    <title>Formulario de Registro</title>    
@endsection
<!-- Fin sección head -->

@section('content')

    <!--Breadcrumb página productos-->
    <br>
    <div class="breadtop">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/productos">Formulario de Registro</a></li>
            </ol>
        </nav>
    </div>
    <!-- Fin Breadcrumb página productos-->

    <div class="container">
        <br>
        <div class="text-center">
            <img src="{{asset('images/EscudoArmas.png')}}" width="10%" height="10%" alt="">
        </div>
        
        <br>
        <p class="text-center text-success mb-0"><b>GOBIERNO AUTÓNOMO DECENTRALIZADO</b></p>
        <p class="text-center text-success">MUNICIPAL DEL CANTÓN MEJÍA</p>
        <p class="text-center">DIRECCIÓN DE DESARROLLO ECONÓMICO Y PRODUCTIVO</p>

        <h2 class="text-center"><b>FORMULARIO PARA REGISTRO DE EMPRENDEDORES</b></h2>
        <h3 class="text-center text-success"><b>Punto de Venta físico - Tienda Pichincha - Mejía</b></h3>
        
        <br><br>

        <div id="formularioNumeroProductos">
            
            <form action="" id="crearFormularioForm">
                <div class="row g-3">
                    <div class="col-auto">
                        <label for="crearFormulario" class="form-label"><b>¿Cuántos productos desea ingresar? (min 1 - máx 10)</b></label>
                    </div>
                    <div class="col-auto">
                        <input type="number" min="1" max="10" class="form-control" id="crearFormulario" placeholder="">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-warning mb-3">Crear formulario</button>
                    </div>
                </div>
            </form>
        </div>
        

        
        <div id="formularioCompleto" style="display: none;">
            <h6><b>INFORMACIÓN DEL OFERTANTE</b></h6>
            {{-- <form method="post" action="{{url('/formularioEmprendedores/enviar')}}"> --}}
            <form id="formularioEmprendedoresProductos">
                {{-- @csrf --}}
            
                <input type="hidden" id="numeroProductos" name="numeroProductos">
                <div class="mb-3">
                    <label for="empNombreEmpresa" class="form-label">1. Nombre empresa / Organización</label>
                    <input type="text" class="form-control" id="empNombreEmpresa" name="empNombreEmpresa" placeholder="">
                    <p class="invalid-feedback" id="error-empNombreEmpresa"></p>
                </div>
                <div class="mb-3">
                    <label for="empNumeroRUC" class="form-label">2. Número de RUC / C.I. / Pasaporte</label>
                    <input type="text" class="form-control" id="empNumeroRUC" name="empNumeroRUC" placeholder="">
                    <p class="invalid-feedback" id="error-empNumeroRUC"></p>
                </div>
                <div class="mb-3">
                    <label for="empUbicacion" class="form-label">3. Ubicación: Provincia, Cantón, Parroquia</label>
                    <input type="text" class="form-control" id="empUbicacion" name="empUbicacion" placeholder="">
                    <p class="invalid-feedback" id="error-empUbicacion"></p>
                </div>
                <div class="mb-3">
                    <label for="empDireccion" class="form-label">4. Dirección</label>
                    <input type="text" class="form-control" id="empDireccion" name="empDireccion" placeholder="">
                    <p class="invalid-feedback" id="error-empDireccion"></p>
                </div>
                <div class="mb-3">
                    <label for="empTelefono" class="form-label">5. Número de teléfono (celular y/o convencional)</label>
                    <input type="text" class="form-control" id="empTelefono" name="empTelefono" placeholder="">
                    <p class="invalid-feedback" id="error-empTelefono"></p>
                </div>
                <div class="mb-3">
                    <label for="empCorreo" class="form-label">6. Dirección de correo electrónico y redes sociales</label>
                    <input type="email" class="form-control" id="empCorreo" name="empCorreo" placeholder="Correo">
                    <p class="invalid-feedback" id="error-empCorreo"></p>
                    <input type="text" class="form-control" id="empRedes" name="empRedes" placeholder="Redes sociales">
                    <p class="invalid-feedback" id="error-empRedes"></p>
                </div>
                <div class="mb-3">
                    <label for="empPropietario" class="form-label">7. Nombre del propietario o representante legal</label>
                    <input type="text" class="form-control" id="empPropietario" name="empPropietario" placeholder="">
                    <p class="invalid-feedback" id="error-empPropietario"></p>
                </div>
                <div class="mb-3">
                    <label for="empContacto" class="form-label">8. Persona de contacto</label>
                    <input type="text" class="form-control" id="empContacto" name="empContacto" placeholder="">
                    <p class="invalid-feedback" id="error-empContacto"></p>
                </div>
                <div class="mb-3">
                    <label for="empTelfContacto" class="form-label">9. Número de teléfono de la persona de contacto</label>
                    <input type="text" class="form-control" id="empTelfContacto" name="empTelfContacto" placeholder="">
                    <p class="invalid-feedback" id="error-empTelfContacto"></p>
                </div>
                <br>
            
                <div id="contenedorFormularios"></div>
                <br>
                <div class="text-center col-12">
                    <button type="submit" class="btn btn-success">Enviar formulario</button>
                </div>
            </form>
            <br><br>
        </div>

        
    </div>

    

@endsection

@section('footer')
    <!--Crea el formulario-->
    <script src="{{ asset('js/formularioEmprendimientos.js') }}"></script>    
@endsection