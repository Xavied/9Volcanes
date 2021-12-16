@extends('layouts/plantilla')


@section('content')

<div class="container">
    <br>
    <div class="row justify-content center">
        <div class="col">
            <div class="card ">
                <div class="card-header">
                    Productos
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#modalNuevoProducto">
                        Crear
                    </button>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productosindex as $producto)
                                <tr>
                                    <td>{{$producto->id}}</td>
                                    <td>{{$producto->nombre}}</td>
                                    <td>    
                                        <form name="formPoblarProducto" enctype="multipart/form-data" role="form">
                                            <input type="hidden" value="{{$producto->id}}" name="idPoblarProducto">
                                            <button type="submit" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalEditarProducto">
                                                Editar
                                            </button>                                            
                                        </form>                                        
                                    </td>
                                    <td>    
                                        <form name="formPoblarProducto" enctype="multipart/form-data" role="form">
                                            <input type="hidden" value="{{$producto->id}}" name="idPoblarProducto">
                                            <button type="submit" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalEditarProducto">
                                                Editar imagenes
                                            </button>                                            
                                        </form>                                        
                                    </td>
                                    <td>
                                        <form name="formDestroyProducto" enctype="multipart/form-data" role="form">
                                            @method('DELETE')
                                            <input type="hidden" value="{{$producto->id}}" name="idEliminarProducto">
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>                                            
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </div>
    <br>
</div>

@include('productos.modalesProductos')
@endsection