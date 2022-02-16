<x-app-layout>
    <br>
    <div style="justify-content: center; align-items: center;  display: flex;">
        <button type="button" class="btn btn-outline-success btn-block" data-bs-toggle="modal"
            data-bs-target="#modalNuevaColumna1">
            Editar columna "{{$titleC1}}" pie de página
        </button>
    </div>
    <br>
    <div style="justify-content: center; align-items: center;  display: flex;">
        <button type="button" class="btn btn-outline-success btn-block" data-bs-toggle="modal"
            data-bs-target="#modalNuevaColumna2">
            Editar columna "{{$titleC2}}"  pie de página
        </button>
    </div>    
    <br>
    <br>
    @include('footerAdmin.modalesFooter')
</x-app-layout>
