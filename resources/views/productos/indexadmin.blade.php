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
                                <th colspan="2">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productosindex as $producto)
                                <tr>
                                    <td>{{$producto->id}}</td>
                                    <td>{{$producto->nombre}}</td>
                                    <td>
                                        <a href="" class="btn btn-outline-primary btn-sm">
                                            Editar
                                        </a>
                                    </td>
                                    <td>
                                        <form id="formDestroyProducto" enctype="multipart/form-data" role="form">
                                            @method('DELETE')
                                            <input type="hidden" value="{{$producto->id}}" id="idEliminarProducto" name="idEliminarProducto">
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