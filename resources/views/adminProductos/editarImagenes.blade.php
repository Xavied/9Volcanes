@extends('layouts/plantilla')

@section('content')

<!--Breadcrumb página productos-->
<br>
<div class="breadtop">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="{{route('admin.adminProductos')}}">Editar Productos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar imágenes de {{$producto->nombre}}</li>
        </ol>
    </nav>
</div>
<!-- Fin Breadcrumb página productos-->

<div class="container">
    <br>
    <!-- Button trigger modal -->
    <div class="row justify-content center">
        <div class="col">
            <div class="card ">
                <div class="card-header">
                    Imágenes del producto {{$producto->nombre}}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#modalAnadirImagen">
                        Añadir Imágenes
                    </button>
                </div>
                <div class="card-body table-responsive-xxl">
                    <table class="table align-middle">                        
                        <tbody>
                            @foreach ($producto->Imagenes as $imagen)
                                <tr>
                                    <td colspan="1" class="text-center"><img src="{{url('/storage').'/'.$imagen->url}}" class="card-img-top img-thumbnail" style="width: 300px; height: 300px;" alt=""></td>
                                    <td colspan="1" class="text-left">
                                        @if ($producto->Imagenes->count()>1)
                                            <form name="formDestroyImagen" enctype="multipart/form-data" role="form">
                                                @method('DELETE')
                                                <input type="hidden" value="{{$imagen->id}}" name="idEliminarImagen">
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>                                            
                                            </form>                            
                                        @else
                                            <button type="submit" class="btn btn-sm btn-outline-danger" disabled>Eliminar</button>
                                        @endif                        
                                    </td>                    
                                </tr>
                                
                                    @if ($producto->Imagenes->count()==1)
                                        <tr>
                                            <td colspan="2">                                
                                            <p class="text-muted text-end fst-italic">*La imagen no puede ser eliminada porque el producto debe tener al menos una imagen.</p>
                                            </td>
                                        </tr>                                                      
                                    @endif 
                            @endforeach
                        </tbody>
                
                    </table>

                </div>        
            </div>
        </div>
    </div>
</div>




@include('adminProductos.modalImagenes')
@endsection
