@extends('layouts/plantilla')


@section('content')

<div class="container">
    <br>
    <div class="row justify-content center">
        <div class="col">
            <div class="card ">
                <div class="card-header">
                    Clientes
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#modalNuevoCliente">
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
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{$cliente->id}}</td>
                                    <td>{{$cliente->nombre}}</td>
                                    <td>    
                                        <form name="formPoblarCliente" enctype="multipart/form-data" role="form">
                                            <input type="hidden" value="{{$cliente->id}}" name="idPoblarCliente">
                                            <button type="submit" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalEditarCliente">
                                                Editar
                                            </button>                                            
                                        </form>                                        
                                    </td>                                    
                                    <td>
                                        <form name="formDestroyCliente" enctype="multipart/form-data" role="form">
                                            @method('DELETE')
                                            <input type="hidden" value="{{$cliente->id}}" name="idEliminarCliente">
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

@include('clientesAdmin.modalesClientes')
@endsection